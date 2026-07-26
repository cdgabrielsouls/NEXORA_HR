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

          <!-- Weekly DTR Overview -->
          <div class="w-[881px] shrink-0 h-[150px] rounded-[20px] bg-[#1B3A6B] border border-white/[.05] px-6 py-3 flex flex-col">
            <div class="text-center text-white text-[25px] font-semibold tracking-wide mb-2">Weekly DTR Overview</div>
            <div class="flex-1 grid grid-cols-2 divide-x divide-white/[.08]">

              <div class="flex flex-col items-center justify-center gap-1.5">
                <div class="flex items-center gap-2">
                  <svg viewBox="0 0 24 24" fill="none" class="w-4 h-4 shrink-0">
                    <path d="M5 12H19" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M9 6H15" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M9 18H15" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                  </svg>
                  <span class="text-[13.9px] text-[#E7F0FF]">Weekly Working Hours</span>
                </div>
                <div class="flex items-end gap-2">
                  <div class="counter text-[22.2px] font-bold leading-none tracking-tight" data-target="{{ number_format((float) ($weeklyWorkingHours ?? 0), 1, '.', '') }}">0</div>
                  <div class="text-[10.7px] text-[#93A9CC] -mt-px">hrs this week</div>
                </div>
              </div>

              <div class="flex flex-col items-center justify-center gap-1.5">
                <div class="flex items-center gap-2">
                  <svg viewBox="0 0 24 24" fill="none" class="w-4 h-4 shrink-0">
                    <rect x="4" y="5" width="16" height="15" rx="2" stroke="#DCEBFF" stroke-width="1.8"/>
                    <path d="M4 9H20" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M8 3V6" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M16 3V6" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                  </svg>
                  <span class="text-[13.9px] text-[#E7F0FF]">Weekly Working Days</span>
                </div>
                <div class="flex items-end gap-2">
                  <div class="counter text-[22.2px] font-bold leading-none tracking-tight" data-target="{{ (int) ($weeklyWorkingDays ?? 0) }}">0</div>
                  <div class="text-[10.7px] text-[#93A9CC] -mt-px">days this week</div>
                </div>
              </div>

            </div>
          </div>

          <!-- Yearly Leave Overview -->
          <div class="w-[881px] shrink-0 h-[150px] rounded-[20px] bg-[#1B3A6B] border border-white/[.05] px-6 py-3 flex flex-col">
            <div class="text-center text-white text-[25px] font-semibold tracking-wide mb-2">Yearly Leave Overview</div>
            <div class="flex-1 grid grid-cols-2 divide-x divide-white/[.08]">

              <div class="flex flex-col items-center justify-center gap-1.5">
                <div class="flex items-center gap-2">
                  <svg viewBox="0 0 24 24" fill="none" class="w-4 h-4 shrink-0">
                    <path d="M5 7H19" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M5 12H15" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M5 17H11" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                  </svg>
                  <span class="text-[13.9px] text-[#E7F0FF]">Monthly Leave Records</span>
                </div>
                <div class="flex items-end gap-2">
                  <div class="counter text-[22.2px] font-bold leading-none tracking-tight" data-target="{{ $leaveMonthlyApproved ?? 0 }}">0</div>
                  <div class="text-[10.7px] text-[#93A9CC] -mt-px">approved this month</div>
                </div>
              </div>

              <div class="flex flex-col items-center justify-center gap-1.5">
                <div class="flex items-center gap-2">
                  <svg viewBox="0 0 24 24" fill="none" class="w-4 h-4 shrink-0">
                    <path d="M12 3V21" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M5 8H19" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M5 16H19" stroke="#DCEBFF" stroke-width="1.8" stroke-linecap="round"/>
                  </svg>
                  <span class="text-[13.9px] text-[#E7F0FF]">Yearly Leave Records</span>
                </div>
                <div class="flex items-end gap-2">
                  <div class="counter text-[22.2px] font-bold leading-none tracking-tight" data-target="{{ $leaveYearlyApproved ?? 0 }}">0</div>
                  <div class="text-[10.7px] text-[#93A9CC] -mt-px">approved this year</div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </article>

      <!-- Bar chart -->
      <article class="tilt opacity-0 animate-cardIn [animation-delay:.32s] rounded-[30px] bg-[#1B3A6B] border border-white/[.05] p-6 overflow-hidden">
        <div class="flex items-center justify-between mb-6">
          <div>
            <h2 class="text-white text-[20px] font-semibold">Annual Working Hours Reports</h2>
            <p class="text-[#93A9CC] text-[13px] mt-1">Monthly total hours based on logged attendance.</p>
          </div>
        </div>

        <div class="grid grid-cols-[auto_1fr] gap-6 items-center">
          <div class="w-[68px] text-[12px] text-[#93A9CC] uppercase tracking-[0.18em]">Hours</div>
          <div class="space-y-4">
            <div class="h-[255px] att-grid-lines w-full rounded-[28px] bg-[#132B52] p-5">
              <div class="relative h-full flex items-end gap-4">
                @foreach($workHoursByMonth ?? array_fill(1,12,0) as $month => $hours)
                  <div class="relative flex flex-col items-center justify-end gap-2 h-full">
                    <div class="w-[24px] rounded-t-[18px] bg-gradient-to-t from-accent to-[#5bb4ff] origin-bottom animate-growBar" style="height: calc({{ $hours }} / {{ $maxMonthHours }} * 100%); min-height: 4px;"></div>
                    <span class="text-[11px] text-[#93A9CC]">{{ strtoupper(substr(DateTime::createFromFormat('!m', $month)->format('M'), 0, 3)) }}</span>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="grid grid-cols-12 gap-3 text-[10px] text-[#6d8fb7]">
              @foreach(range(1, 12) as $month)
                <div class="col-span-1 text-center">{{ strtoupper(substr(DateTime::createFromFormat('!m', $month)->format('M'), 0, 3)) }}</div>
              @endforeach
            </div>
          </div>
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
      const target = parseFloat(el.dataset.target || '0');
      const duration = 1450;
      const start = performance.now();
      function update(now){
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const value = target * eased;
        const displayValue = Number.isInteger(target)
          ? Math.round(value).toLocaleString()
          : value.toFixed(1).toLocaleString();
        el.textContent = displayValue;
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