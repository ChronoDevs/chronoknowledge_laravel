<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserEloquentRepository extends MainEloquentRepository implements UserRepositoryInterface
{
    /*======================================================================
     * PROPERTIES
     *======================================================================*/

    /**
     * @var User $Model
     */
    public $Model = User::class;

    /*======================================================================
     * METHODS
     *======================================================================*/

    /**
     * acquire all User records
     *
     * @param Int $paginatePerPage
     * @return LengthAwarePaginator
     */
    public function acquireAll($paginatePerPage = 10): LengthAwarePaginator
    {
        $rtn = $this->arrayToPagination([]);

        try {
            // $query = $this->Model::whereNotDeleted();
            // $rtn = $query->sortDesc()->paginate($paginatePerPage);
        } catch (\Exception $e) {
            \Log::error('Exception: ' . $e->getMessage());
        }

        return $rtn;
    }

    /**
     * acquire a User record
     *
     * @param Int $id
     * @return User
     */
    public function acquire($id)
    {
        return parent::acquire($id);
    }

    /**
     * add a User record
     *
     * @param Array $attributes
     * @return Bool/User
     */
    public function add(array $attributes)
    {
        return parent::add($attributes);
    }

    /**
     * adjust a User record
     *
     * @param Int $id
     * @param Array $attributes
     * @return Bool/User
     */
    public function adjust(int $id, array $attributes)
    {
        return parent::adjust($id, $attributes);
    }

    /**
     * annul a User record
     *
     * @param Int $id
     * @return Bool
     */
    public function annul(int $id)
    {
        return parent::annul($id);
    }

    /**
     * acquire Message records From Filter
     *
     * @param Null/Int $type
     * @param Int $type
     * @return Collection/Model
     */
    public function acquireAllByFilterAndSorting($paginatePerPage = 10)
    {
        $rtn = $this->arrayToPagination([]);

        try {
            $query = $this->Model::whereNotDeleted();
            $currentDate = Carbon::now();
            $filters = request()->only([
                'flyerName',
                'status',
                'displayStore',
                'startDateTime',
                'endDateTime',
            ]);

            foreach ($filters as $property => $value) {
                if (isset($value)) {
                    switch ($property) {
                        case 'flyerName':
                            $query = $query->where($property, 'LIKE', '%' . $value . '%');
                            break;
                        case 'status':
                            switch ($value) {
                                case \Globals::mUser()::STATUS_ENDOFPUBLICATION:
                                    $query = $query->whereRaw('STR_TO_DATE(endDateTime, "%Y-%m-%d %H:%i") < "' . $currentDate->format('Y-m-d H:i') . '"');
                                    break;
                                case \Globals::mUser()::STATUS_COMINGSOON:
                                    $query = $query->whereRaw('STR_TO_DATE(startDateTime, "%Y-%m-%d %H:%i") > "' . $currentDate->format('Y-m-d H:i') . '"');
                                    break;
                                case \Globals::mUser()::STATUS_OPENNOW:
                                    $query = $query->whereNotNull('startDateTime')->whereNotNull('endDateTime');
                                    $query = $query->whereRaw('STR_TO_DATE(startDateTime, "%Y-%m-%d %H:%i") < "' . $currentDate->format('Y-m-d H:i') . '"');
                                    $query = $query->whereRaw('STR_TO_DATE(endDateTime, "%Y-%m-%d %H:%i") > "' . $currentDate->format('Y-m-d H:i') . '"');
                                    break;
                            }
                            break;
                        case 'displayStore':
                            foreach ($value as $storeId) {
                                $query = $query->whereHas('flyerDisplayStore', function ($query) use ($storeId) {
                                    $query->where('storeId', $storeId);
                                    return $query;
                                });
                            }
                            break;
                        case 'startDateTime':
                            $query = $query->whereDate($property, '>=', $value);
                            break;
                        case 'endDateTime':
                            $query = $query->whereDate($property, '<=', $value);
                            break;
                        default:
                            $query = $query->where($property, $value);
                    }
                }
            }

            $sortColumn = request()->get('column', '');
            $sortBy = request()->get('sortBy', '');

            switch ($sortColumn) {
                case 'status':
                    $status = "(CASE ";
                    $status .= "    WHEN (NOW() > startDateTime) THEN 0 ";
                    $status .= "    WHEN (NOW() < endDateTime) THEN 1 ";
                    $status .= "    ELSE 2 ";
                    $status .= "END)";
                    $query = $query->orderByRaw($status . ' ' . $sortBy);
                    break;
                case 'storeId':
                    $storeIdsOrder = array_keys(config('const.listStore'));
                    $storeIdsOrder = implode(', ', $storeIdsOrder);

                    $queryStoreOrder = 'FIELD (storeId, ' . $storeIdsOrder . ') ' . $sortBy;
                    $queryStore = "SELECT CAST(RPAD(GROUP_CONCAT((FIELD (storeId, " . $storeIdsOrder . ")) SEPARATOR ''), 7, '0') as int) FROM T_FlyerDisplayStore WHERE delFlg=0 AND UserId=M_User.UserId GROUP BY UserId ORDER BY " . $queryStoreOrder;
                    $queryStoreWithCase = 'CASE WHEN (' . $queryStore . ') IS NULL THEN 0 ELSE (' . $queryStore . ') END';
                    $query = $query->orderByRaw('(' . $queryStoreWithCase . ') ' . $sortBy);
                    break;
                case 'UserId':
                case 'flyerName':
                case 'startDateTime':
                case 'endDateTime':
                    $query = $query->orderBy($sortColumn, $sortBy);
                    break;
                default:
                    $query = $query->orderBy('startDateTime', 'desc');
            }

            $rtn = $query->orderBy('UserId', 'desc')->paginate($paginatePerPage);
        } catch (\Exception $e) {
            \L0g::error('Exception: ' . $e->getMessage());
            \SlackLog::error('Exception: ' . $e->getMessage());
        } catch (\Error $e) {
            \L0g::error($e->getMessage());
            \SlackLog::error($e->getMessage());
        }

        return $rtn;
    }
}
