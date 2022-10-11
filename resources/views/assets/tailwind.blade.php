@push('assetJs')
  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            't-primary': '#78dcca',
            't-secondary': '#3E4153',
            't-btn': '#51536C',
            'c-fb': '#5352ed',
            'c-google': '#ff6348',
            't-create': '#71C5DC',
            't-success': 'rgba(76,175,80,.12)',
            't-edit': 'white',
            't-danger': 'rgba(244,67,54,.12)',
            't-info': 'rgba(33,150,243,.12)',
            't-info': 'rgba(255,152,0,.12)',
            't-warning': 'rgba(255,152,0,.12)',
            'form-overlay': 'rgba(0,0,0,0.5)'
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
