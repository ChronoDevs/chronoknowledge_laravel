@push('assetJs')
  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>

  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
@endpush

@push('assetCss')
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
@endpush
