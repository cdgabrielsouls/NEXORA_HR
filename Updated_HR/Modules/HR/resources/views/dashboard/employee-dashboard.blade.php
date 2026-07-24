<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="icon" href="{{ asset('images/Nexora_Logo_Transparent(1).png') }}" type="image/png">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
          colors: {
            navy: {
              bg: '#132C5B',
              deep: '#0B1E3D',
              panel: '#10233d',
              card: '#173767',
              top: '#132B52',
            },
            accent: {
              DEFAULT: '#2D7EFF',
              light: '#3F8CFF',
              soft: '#66A6FF',
            },
          },
          keyframes: {
            pageFade: {
              from: { opacity: 0, transform: 'translateY(8px)' },
              to:   { opacity: 1, transform: 'translateY(0)' },
            },
            cardIn: {
              from: { opacity: 0, transform: 'translateY(16px)' },
              to:   { opacity: 1, transform: 'translateY(0)' },
            },
            heroFloat: {
              '0%,100%': { transform: 'translateY(-50%) rotate(0deg)' },
              '50%':     { transform: 'translateY(calc(-50% - 8px)) rotate(3deg)' },
            },
            growBar: {
              from: { transform: 'scaleY(0)' },
              to:   { transform: 'scaleY(1)' },
            },
          },
          animation: {
            pageFade: 'pageFade .9s ease forwards',
            cardIn: 'cardIn .7s cubic-bezier(.2,.8,.2,1) forwards',
            heroFloat: 'heroFloat 8s ease-in-out infinite',
            growBar: 'growBar .9s cubic-bezier(.2,.8,.2,1) forwards',
          },
        },
      },
    };
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
    body {
      background: #0B1E3D;
    }
    /* Grid lines behind the attendance bars — easiest kept as a small utility, Tailwind has no clean bg-stripe primitive */
    .att-grid-lines {
      background: linear-gradient(to top,
        transparent 0 19%, rgba(255,255,255,.04) 19% 20%,
        transparent 20% 39%, rgba(255,255,255,.04) 39% 40%,
        transparent 40% 59%, rgba(255,255,255,.04) 59% 60%,
        transparent 60% 79%, rgba(255,255,255,.04) 79% 80%,
        transparent 80% 100%);
    }
    .tilt { transform-style: preserve-3d; }
  </style>
</head>
<body class="w-full min-h-screen bg-[#0B1E3D] text-white font-sans opacity-0 animate-pageFade">

  @include('partials.employee-navbar')


  <!-- =====================================================
       MAIN CONTENT
  ====================================================== -->
  <main class="w-full px-3 md:px-5 pb-5 pt-20">
    <div class="flex flex-col gap-10 max-w-[1820px] mx-auto">

      <!-- Welcome card -->
      <!-- FIX: the old markup hard-coded width:1818px on the inner flex box, which overflowed the
           rounded, overflow-hidden card and made the right edge render with square corners.
           Using w-full here lets the card's own `rounded-3xl overflow-hidden` do the rounding. -->
      <article class="tilt opacity-0 animate-cardIn rounded-3xl overflow-hidden bg-[#1B3A6B]">
        <div class="w-[1740px] h-[150px] flex items-stretch justify-between gap-5 px-0 py-px relative">
          <div class="flex flex-col justify-start pt-2 pl-6">
            
            <h1 class="text-white text-2xl md:text-3xl font-bold mt-0.5">
              Welcome back, {{ session('employee_name') }}
            </h1>
            <div class="text-[13px] font-medium text-accent-soft mt-1">
  {{ ucfirst(session('employee_role', '')) }}
</div>
            <div class="mt-3.5 text-[11.9px] italic leading-snug text-[#90A7CC] max-w-[550px]">
This dashboard provides a live overview of employee information and HR activities, ensuring you always have access to the latest workforce data.            </div>
          </div>

          <div class="flex-1 relative flex items-center overflow-hidden">
            <div class="absolute left-[110px] md:left-[500px] top-1/2  w-[180px] h-[180px] md:w-[300px] md:h-[300px]
                        opacity-70 pointer-events-none select-none animate-heroFloat
                        [filter:drop-shadow(0_0_20px_rgba(45,126,255,.20))_drop-shadow(0_0_40px_rgba(45,126,255,.12))]">
              <img src="{{ asset('images/Nexora_Logo_Transparent(1).png') }}" alt="Hero Logo" class="w-full h-full object-contain">
            </div>

            <!-- Live date & time -->
            <div class="ml-auto pr-8 text-right relative z-10">
              <div id="liveDate" class="text-[18px] font-semibold text-white"></div>
              <div id="liveTime" class="text-[16px]  mt-0.5"></div>
            </div>
          </div>
        </div>
      </article>

      <!-- Stats -->
      <article class="tilt opacity-0 animate-cardIn [animation-delay:.15s] overflow-x-auto">
        <div class="flex flex-row gap-[50px] pt-[5.5px] pr-[px] pb-[5px] pl-[px] w-[1818px] max-w-none">

          <!-- Total Employees -->
          <div class="w-[881px] shrink-0 h-[150px] rounded-[20px] bg-[#1B3A6B] border border-white/[.05] px-4 py-1.5 flex items-start justify-between">
            <div class="flex items-start gap-3">
              <div class="w-[39px] h-[39px] mt-0.5 rounded-xl grid place-items-center bg-white/[.05] shrink-0">
                <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                  <circle cx="9" cy="10" r="3" stroke="#DCEBFF" stroke-width="1.8"/>
                  <circle cx="16.3" cy="11.2" r="2.4" stroke="#DCEBFF" stroke-width="1.8"/>
                  <path d="M4.8 18.4C6 15.8 7.9 14.7 10.1 14.7C12.3 14.7 14.1 15.8 15.3 18.4" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M15.4 18.2C16 16.8 17.2 16.1 18.4 16.1C19.5 16.1 20.4 16.5 21 17.4" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
              </div>
              <div>
                <div class="text-[11.9px] text-[#E7F0FF] mt-px">Total Employees</div>
                <div class="flex items-end gap-2 mt-0">
                  <div class="counter text-[22.2px] font-bold leading-none tracking-tight" data-target="{{ $employeeCount }}">0</div>
                  <div class="text-[8.7px] text-[#93A9CC] -mt-px">vs. last month</div>
                </div>
              </div>
            </div>
            <div class="h-[18px] px-2.5 rounded-full inline-flex items-center justify-center text-[7px] font-extrabold bg-[#350808] text-red-500 shadow-[inset_0_1px_0_rgba(255,255,255,.06)]">-4.5%</div>
          </div>

          
          <!-- Total Employees -->
          <div class="w-[881px] shrink-0 h-[150px] rounded-[20px] bg-[#1B3A6B] border border-white/[.05] px-4 py-1.5 flex items-start justify-between">
            <div class="flex items-start gap-3">
              <div class="w-[39px] h-[39px] mt-0.5 rounded-xl grid place-items-center bg-white/[.05] shrink-0">
                <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                  <circle cx="9" cy="10" r="3" stroke="#DCEBFF" stroke-width="1.8"/>
                  <circle cx="16.3" cy="11.2" r="2.4" stroke="#DCEBFF" stroke-width="1.8"/>
                  <path d="M4.8 18.4C6 15.8 7.9 14.7 10.1 14.7C12.3 14.7 14.1 15.8 15.3 18.4" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                  <path d="M15.4 18.2C16 16.8 17.2 16.1 18.4 16.1C19.5 16.1 20.4 16.5 21 17.4" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
              </div>
              <div>
                <div class="text-[11.9px] text-[#E7F0FF] mt-px">Total Employees</div>
                <div class="flex items-end gap-2 mt-0">
                  <div class="counter text-[22.2px] font-bold leading-none tracking-tight" data-target="{{ $employeeCount }}">0</div>
                  <div class="text-[8.7px] text-[#93A9CC] -mt-px">vs. last month</div>
                </div>
              </div>
            </div>
            <div class="h-[18px] px-2.5 rounded-full inline-flex items-center justify-center text-[7px] font-extrabold bg-[#350808] text-red-500 shadow-[inset_0_1px_0_rgba(255,255,255,.06)]">-4.5%</div>
          </div>
         
      </article>

      
    </div>
  </main>

  <script>
    /* LIVE DATE & TIME (GMT+8) */
    function updateLiveDateTime(){
      const now = new Date();
      const dateStr = now.toLocaleDateString('en-US', {
        weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZone: 'Asia/Manila'
      });
      const timeStr = now.toLocaleTimeString('en-GB', {
        hour: '2-digit', minute: '2-digit', hour12: false, timeZone: 'Asia/Manila'
      });
      const dateEl = document.getElementById('liveDate');
      const timeEl = document.getElementById('liveTime');
      if (dateEl) dateEl.textContent = dateStr;
      if (timeEl) timeEl.textContent = `GMT +8   ${timeStr}`;
    }
    updateLiveDateTime();
    setInterval(updateLiveDateTime, 1000);

    /* COUNTER ANIMATION */
    document.querySelectorAll('.counter').forEach((counter, index) => {
      setTimeout(() => animateCounter(counter), 320 + index * 110);
    });
    function animateCounter(el){
      const target = parseInt(el.dataset.target, 10);
      const duration = 1450;
      const start = performance.now();
      function update(now){
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        el.textContent = Math.round(target * eased).toLocaleString();
        if (progress < 1) requestAnimationFrame(update);
      }
      requestAnimationFrame(update);
    }

    /* SUBTLE CARD TILT */
    document.querySelectorAll('.tilt').forEach(card => {
      let raf = null;
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const px = (e.clientX - rect.left) / rect.width;
        const py = (e.clientY - rect.top) / rect.height;
        const rotateY = (px - 0.5) * 4.6;
        const rotateX = (0.5 - py) * 4.2;
        if (raf) cancelAnimationFrame(raf);
        raf = requestAnimationFrame(() => {
          card.style.transform = `perspective(900px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
      });
      card.addEventListener('mouseleave', () => {
        if (raf) cancelAnimationFrame(raf);
        card.style.transform = 'perspective(900px) rotateX(0deg) rotateY(0deg)';
      });
    });
  </script>
</body>
</html>