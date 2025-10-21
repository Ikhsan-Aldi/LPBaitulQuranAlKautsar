<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin | Pondok Pesantren</title>
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'primary-dark': '#005359',
            'primary': '#017077',
            'primary-medium': '#006e75',
            'primary-light': '#1b7c82',
            'white': '#ffffff',
          },
          fontFamily: {
            'poppins': ['Poppins', 'sans-serif'],
            'amiri': ['Amiri', 'serif'],
          },
          animation: {
            'fade-in': 'fadeIn 0.8s ease-in-out',
            'slide-up': 'slideUp 0.6s ease-out',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0' },
              '100%': { opacity: '1' },
            },
            slideUp: {
              '0%': { transform: 'translateY(20px)', opacity: '0' },
              '100%': { transform: 'translateY(0)', opacity: '1' },
            }
          }
        }
      }
    }
  </script>
  
  <style>
    .islamic-pattern {
      background-image: url("data:image/svg+xml,%3Csvg width='100' height='20' viewBox='0 0 100 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M21.184 20c.357-.13.720-.264 1.088-.402l1.768-.661C33.64 15.347 39.647 14 50 14c10.271 0 15.362 1.222 24.629 4.928.955.383 1.869.74 2.75 1.072h6.225c-2.51-.73-5.139-1.691-8.233-2.928C65.888 13.278 60.562 12 50 12c-10.626 0-16.855 1.397-26.66 5.063l-1.767.662c-2.475.923-4.66 1.674-6.724 2.275h6.335zm0-20C13.258 2.892 8.077 4 0 4V2c5.744 0 9.951-.574 14.85-2h6.334zM77.38 0C85.239 2.966 90.502 4 100 4V2c-6.842 0-11.386-.542-16.396-2h-6.225zM0 14c8.44 0 13.718-1.21 22.272-4.402l1.768-.661C33.64 5.347 39.647 4 50 4c10.271 0 15.362 1.222 24.629 4.928C84.112 12.722 89.438 14 100 14v-2c-10.271 0-15.362-1.222-24.629-4.928C65.888 3.278 60.562 2 50 2 39.374 2 33.145 3.397 23.34 7.063l-1.767.662C13.223 10.84 8.163 12 0 12v2z' fill='%23005a5f' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
    }
    
    .card-glow {
      box-shadow: 0 10px 30px rgba(1, 112, 119, 0.15);
    }
  </style>
</head>

<body class="font-poppins bg-primary min-h-screen flex items-center justify-center p-4">
  <!-- Background Pattern -->
  <div class="fixed inset-0 islamic-pattern opacity-25"></div>

  <div class="w-full max-w-md animate-fade-in">
    <!-- Login Card -->
    <div class="bg-white rounded-2xl shadow-2xl card-glow overflow-hidden animate-slide-up">
      <!-- Card Header dengan Logo -->
      <div class="bg-white p-8 text-center border-b border-gray-100">
        <!-- Logo Pondok -->
        <div class="flex justify-center mb-4">
          <div class="bg-white p-4 rounded-2xl shadow-lg">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo Pondok" class="w-32 h-32 object-contain" 
                 onerror="this.style.display='none'; document.getElementById('fallback-logo').style.display='flex';">
            <div id="fallback-logo" class="w-32 h-32 items-center justify-center hidden">
              <svg class="w-12 h-12 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M12 2L2 7V9H22V7L12 2Z" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2 9V21H22V9" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 17C13.6569 17 15 15.6569 15 14C15 12.3431 13.6569 11 12 11C10.3431 11 9 12.3431 9 14C9 15.6569 10.3431 17 12 17Z" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M17 21V14C17 12.3431 15.6569 11 14 11H10C8.34315 11 7 12.3431 7 14V21" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
        </div>
        
        <!-- Judul Login -->
        <h2 class="text-2xl font-bold text-primary-dark">Login Admin</h2>
        <p class="text-gray-600 mt-2">Masuk ke sistem manajemen</p>
      </div>

      <!-- Card Body -->
      <div class="p-8">
        <!-- Alert Messages -->
        <?php if (session()->getFlashdata('error')): ?>
          <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 animate-pulse">
            <div class="flex items-center space-x-2">
              <i class="fa fa-exclamation-circle text-red-500"></i>
              <span class="font-medium"><?= session()->getFlashdata('error') ?></span>
            </div>
          </div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('success')): ?>
          <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700">
            <div class="flex items-center space-x-2">
              <i class="fa fa-check-circle text-green-500"></i>
              <span class="font-medium"><?= session()->getFlashdata('success'); ?></span>
            </div>
          </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form method="post" action="<?= base_url('b0/login/submit') ?>" class="space-y-6">
          <!-- Username Field -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Username</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fa fa-user text-gray-400"></i>
              </div>
              <input 
                type="text" 
                name="username" 
                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                placeholder="Masukkan username"
                required 
                autofocus>
            </div>
          </div>

          <!-- Password Field -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fa fa-lock text-gray-400"></i>
              </div>
              <input 
                type="password" 
                name="password" 
                class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                placeholder="Masukkan password"
                required>
              <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword()">
                <i class="fa fa-eye text-gray-400 hover:text-primary cursor-pointer"></i>
              </button>
            </div>
          </div>

          <!-- Submit Button -->
          <button 
            type="submit" 
            class="w-full bg-primary hover:bg-primary-dark text-white py-3 px-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
            <i class="fa fa-sign-in-alt mr-2"></i>
            Masuk ke Sistem
          </button>
        </form>

        <!-- Footer Info -->
        <div class="mt-8 pt-6 border-t border-gray-200 text-center">
          <p class="text-sm text-gray-600">
            <i class="fa fa-info-circle mr-1 text-primary"></i>
            Sistem Manajemen Pondok Pesantren Al-Kautsar
          </p>
        </div>
      </div>
    </div>

    <!-- Copyright -->
    <div class="text-center mt-6">
      <p class="text-white/90 text-sm">
        &copy; <?= date('Y') ?> Pondok Pesantren Al-Kautsar. All rights reserved.
      </p>
    </div>
  </div>

  <script>
    // Toggle password visibility
    function togglePassword() {
      const passwordInput = document.querySelector('input[name="password"]');
      const eyeIcon = document.querySelector('.fa-eye');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
      }
    }

    // Add focus effects
    document.querySelectorAll('input').forEach(input => {
      input.addEventListener('focus', function() {
        this.parentElement.classList.add('ring-2', 'ring-primary-light');
      });
      
      input.addEventListener('blur', function() {
        this.parentElement.classList.remove('ring-2', 'ring-primary-light');
      });
    });

    // Form submission loading state
    document.querySelector('form').addEventListener('submit', function(e) {
      const button = this.querySelector('button[type="submit"]');
      button.innerHTML = '<i class="fa fa-spinner fa-spin mr-2"></i>Memproses...';
      button.disabled = true;
    });

    // Auto focus on username field
    document.addEventListener('DOMContentLoaded', function() {
      const usernameInput = document.querySelector('input[name="username"]');
      if (usernameInput) {
        usernameInput.focus();
      }
    });
  </script>
</body>
</html>