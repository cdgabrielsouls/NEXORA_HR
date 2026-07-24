<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Attendance</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Google Font: Inter -->
    <style type="text/css">@font-face {font-family:Inter;font-style:normal;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/latin-ext/opsz/normal.woff2);unicode-range:U+0100-02BA,U+02BD-02C5,U+02C7-02CC,U+02CE-02D7,U+02DD-02FF,U+0304,U+0308,U+0329,U+1D00-1DBF,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20C0,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/cyrillic/opsz/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/greek-ext/opsz/normal.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/vietnamese/opsz/normal.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/greek/opsz/normal.woff2);unicode-range:U+0370-0377,U+037A-037F,U+0384-038A,U+038C,U+038E-03A1,U+03A3-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/latin/opsz/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:normal;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/cyrillic-ext/opsz/normal.woff2);unicode-range:U+0460-052F,U+1C80-1C8A,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:italic;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/latin-ext/opsz/italic.woff2);unicode-range:U+0100-02BA,U+02BD-02C5,U+02C7-02CC,U+02CE-02D7,U+02DD-02FF,U+0304,U+0308,U+0329,U+1D00-1DBF,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20C0,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Inter;font-style:italic;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/greek-ext/opsz/italic.woff2);unicode-range:U+1F00-1FFF;font-display:swap;}@font-face {font-family:Inter;font-style:italic;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/cyrillic-ext/opsz/italic.woff2);unicode-range:U+0460-052F,U+1C80-1C8A,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F;font-display:swap;}@font-face {font-family:Inter;font-style:italic;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/latin/opsz/italic.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Inter;font-style:italic;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/vietnamese/opsz/italic.woff2);unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+0300-0301,U+0303-0304,U+0308-0309,U+0323,U+0329,U+1EA0-1EF9,U+20AB;font-display:swap;}@font-face {font-family:Inter;font-style:italic;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/greek/opsz/italic.woff2);unicode-range:U+0370-0377,U+037A-037F,U+0384-038A,U+038C,U+038E-03A1,U+03A3-03FF;font-display:swap;}@font-face {font-family:Inter;font-style:italic;font-weight:100 900;src:url(/cf-fonts/v/inter/5.2.8/cyrillic/opsz/italic.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}</style>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                },
            },
        };
    </script>

    <style>
        .status-badge {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 9999px;
            font-size: 0.65rem;
            font-weight: 500;
            background: rgba(255, 255, 255, .06);
            color: #93abd3;
        }

        .status-badge.present { color: #34d399; }
        .status-badge.absent { color: #fb7185; }
        .status-badge.leave { color: #fbbf24; }

        .attendance-thumb {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            object-fit: cover;
            display: inline-block;
            border: 1px solid rgba(255,255,255,.15);
        }

        .attendance-thumb-placeholder {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px dashed rgba(255,255,255,.15);
            color: #4d6a93;
            font-size: 12px;
        }
    </style>
</head>

<body class="font-sans bg-[#18386d] text-white m-0 p-0">

    @include('partials.employee-navbar')

    <div class="w-[96.82%] max-w-[1859px] mx-auto">

       

        <!-- Section heading / actions -->
        <div class="w-full min-h-[60px] rounded-[14px] px-0 py-5 mb-2 flex items-center justify-between gap-4 flex-wrap">
            <div>
                <h2 class="text-[18px] font-semibold text-white">DATE AND TIME RECORD</h2>
                <p class="mt-1 text-[11.9px] text-[#93abd3]">Track your attendance and working hours through your recorded daily time entries.</p>
            </div>
            <div class="flex flex-wrap gap-2">
             
                <button class="rounded-full bg-[#0B1E3D] px-4 py-2 text-[11.9px] text-[#93abd3] border border-white/[0.05]">
                    <i class="fa-solid fa-file-export mr-1"></i> Export
                </button>
            </div>
        </div>

        <!-- Table header -->
        <div class="w-full mx-auto mb-3 bg-[#0B1E3D] border border-white/[0.15] rounded-[10px] overflow-hidden">
            <table class="w-full table-fixed border-collapse">
                <colgroup>
                    <col style="width:16%">
                    <col style="width:13%">
                    <col style="width:13%">
                    <col style="width:13%">
                    <col style="width:13%">
                    <col style="width:16%">
                    <col style="width:16%">
                </colgroup>
                <thead>
                    <tr>
                        <th class="px-[10px] py-[15px] text-center text-[11.9px] font-light uppercase tracking-wide text-white border-r border-white/[0.15]">Date</th>
                        <th class="px-[10px] py-[15px] text-center text-[11.9px] font-light uppercase tracking-wide text-white border-r border-white/[0.15]">Time In</th>
                        <th class="px-[10px] py-[15px] text-center text-[11.9px] font-light uppercase tracking-wide text-white border-r border-white/[0.15]">In Image</th>
                        <th class="px-[10px] py-[15px] text-center text-[11.9px] font-light uppercase tracking-wide text-white border-r border-white/[0.15]">Time Out</th>
                        <th class="px-[10px] py-[15px] text-center text-[11.9px] font-light uppercase tracking-wide text-white border-r border-white/[0.15]">Out Image</th>
                        <th class="px-[10px] py-[15px] text-center text-[11.9px] font-light uppercase tracking-wide text-white border-r border-white/[0.15]">Work Hours</th>
                        <th class="px-[10px] py-[15px] text-center text-[11.9px] font-light uppercase tracking-wide text-white">Status</th>
                    </tr>
                </thead>
            </table>
        </div>

        <!-- Table body -->
        <div class="w-full mx-auto mb-6 bg-[#0B1E3D] border border-white/[0.15] rounded-[10px] overflow-hidden">
            <table class="w-full table-fixed border-collapse">
                <colgroup>
                    <col style="width:16%">
                    <col style="width:13%">
                    <col style="width:13%">
                    <col style="width:13%">
                    <col style="width:13%">
                    <col style="width:16%">
                    <col style="width:16%">
                </colgroup>
                <tbody>
                    <tr class="border-t border-white/[0.08] hover:bg-white/5">
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#E7F0FF]">2026-07-23</td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">08:45</td>
                        <td class="px-[10px] py-[15px] text-center">
                            <img src="/storage/attendance/in_2026-07-23.jpg" alt="Time in photo" class="attendance-thumb mx-auto" onerror="this.replaceWith(Object.assign(document.createElement('span'),{className:'attendance-thumb-placeholder mx-auto',innerHTML:'<i class=\'fa-solid fa-image\'></i>'}))">
                        </td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">17:15</td>
                        <td class="px-[10px] py-[15px] text-center">
                            <img src="/storage/attendance/out_2026-07-23.jpg" alt="Time out photo" class="attendance-thumb mx-auto" onerror="this.replaceWith(Object.assign(document.createElement('span'),{className:'attendance-thumb-placeholder mx-auto',innerHTML:'<i class=\'fa-solid fa-image\'></i>'}))">
                        </td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">8h 30m</td>
                        <td class="px-[10px] py-[15px] text-center"><span class="status-badge present">Present</span></td>
                    </tr>
                    <tr class="border-t border-white/[0.08] hover:bg-white/5">
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#E7F0FF]">2026-07-22</td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">08:50</td>
                        <td class="px-[10px] py-[15px] text-center">
                            <img src="/storage/attendance/in_2026-07-22.jpg" alt="Time in photo" class="attendance-thumb mx-auto" onerror="this.replaceWith(Object.assign(document.createElement('span'),{className:'attendance-thumb-placeholder mx-auto',innerHTML:'<i class=\'fa-solid fa-image\'></i>'}))">
                        </td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">17:10</td>
                        <td class="px-[10px] py-[15px] text-center">
                            <img src="/storage/attendance/out_2026-07-22.jpg" alt="Time out photo" class="attendance-thumb mx-auto" onerror="this.replaceWith(Object.assign(document.createElement('span'),{className:'attendance-thumb-placeholder mx-auto',innerHTML:'<i class=\'fa-solid fa-image\'></i>'}))">
                        </td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">8h 20m</td>
                        <td class="px-[10px] py-[15px] text-center"><span class="status-badge present">Present</span></td>
                    </tr>
                    <tr class="border-t border-white/[0.08] hover:bg-white/5">
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#E7F0FF]">2026-07-21</td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">&mdash;</td>
                        <td class="px-[10px] py-[15px] text-center"><span class="attendance-thumb-placeholder mx-auto">&mdash;</span></td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">&mdash;</td>
                        <td class="px-[10px] py-[15px] text-center"><span class="attendance-thumb-placeholder mx-auto">&mdash;</span></td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">&mdash;</td>
                        <td class="px-[10px] py-[15px] text-center"><span class="status-badge absent">Absent</span></td>
                    </tr>
                    <tr class="border-t border-white/[0.08] hover:bg-white/5">
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#E7F0FF]">2026-07-20</td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">&mdash;</td>
                        <td class="px-[10px] py-[15px] text-center"><span class="attendance-thumb-placeholder mx-auto">&mdash;</span></td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">&mdash;</td>
                        <td class="px-[10px] py-[15px] text-center"><span class="attendance-thumb-placeholder mx-auto">&mdash;</span></td>
                        <td class="px-[10px] py-[15px] text-center text-[11.9px] text-[#93abd3]">&mdash;</td>
                        <td class="px-[10px] py-[15px] text-center"><span class="status-badge leave">Leave</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <script>
        const employeeCounters = document.querySelectorAll('.employee-counter');

        function animateEmployeeCounter(el) {
            const target = parseInt(el.dataset.target, 10) || 0;
            const duration = 1450;
            const start = performance.now();

            function update(now) {
                const progress = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                const current = Math.round(target * eased);
                el.textContent = current.toLocaleString();
                if (progress < 1) requestAnimationFrame(update);
            }

            requestAnimationFrame(update);
        }

        employeeCounters.forEach((counter) => animateEmployeeCounter(counter));
    </script>

</body>

</html>