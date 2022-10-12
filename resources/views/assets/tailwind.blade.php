@push('assetJs')
  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'b-primary': 'rgb(24, 25, 26)',
            'b-secondary': 'rgb(36, 37, 38)',
            'b-input': 'rgb(58, 59, 60)',
            'c-fb': '#5352ed',
            'c-google': '#ff6348',
            'b-create': 'rgb(24, 50, 141)',
            'b-success': 'rgba(76,175,80,.12)',
            'b-edit': 'white',
            'b-danger': 'rgba(244,67,54,.12)',
            'b-info': 'rgba(86,204,242)',
            'b-warning': 'rgba(255,152,0,.12)',
            'b-mute': 'rgb(168, 165, 172)',
            'form-overlay': 'rgba(0,0,0,0.5)'
          }
        },
        borderRadius: {
          'none': '0',
          'sm': '0.125rem',
          DEFAULT: '4px',
          'md': '10px',
          'lg': '0.5rem',
          'full': '9999px',
          'large': '12px',
        }
      }
    }
  </script>

  {{-- <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script> --}}
@endpush

@push('assetCss')
  {{-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" /> --}}
@endpush
