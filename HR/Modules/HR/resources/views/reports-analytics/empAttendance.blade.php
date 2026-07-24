<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee Attendance</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body { font-family: Inter, system-ui, sans-serif; }
  </style>
</head>
<body class="min-h-screen bg-[#1B3A6B] text-slate-200">

  @include('partials.employee-navbar')

  <main class="w-full px-6 py-8">
    <div class="max-w-[1400px] mx-auto space-y-6">
      <section class="rounded-[32px] bg-[#0B1E3D] p-6 ring-1 ring-white/10 shadow-xl shadow-black/20">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
          <div>
            <h1 class="text-3xl font-semibold text-white">Employee Attendance</h1>
            <p class="mt-2 text-sm text-slate-400">View attendance activity and recent clock-ins in a clean, static layout.</p>
          </div>
          <div class="flex flex-wrap gap-3">
            <button class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/10">Summary</button>
            <button class="rounded-full bg-sky-500/20 px-4 py-2 text-sm font-semibold text-sky-200 transition hover:bg-sky-500/30">Download</button>
          </div>
        </div>
      </section>

      <section class="grid gap-4 lg:grid-cols-4">
        <div class="rounded-[28px] bg-[#0B1E3D] p-5 ring-1 ring-white/10">
          <div class="flex items-center justify-between gap-4">
            <div>
              <div class="text-sm uppercase tracking-[.24em] text-slate-500">Present Days</div>
              <div class="mt-3 text-3xl font-semibold text-white">18</div>
            </div>
            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-sky-500/10 text-sky-300">
              <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg>
            </div>
          </div>
        </div>

        <div class="rounded-[28px] bg-[#0B1E3D] p-5 ring-1 ring-white/10">
          <div class="flex items-center justify-between gap-4">
            <div>
              <div class="text-sm uppercase tracking-[.24em] text-slate-500">Absent Days</div>
              <div class="mt-3 text-3xl font-semibold text-white">2</div>
            </div>
            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-rose-500/10 text-rose-300">
              <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 18L18 6M6 6l12 12"/></svg>
            </div>
          </div>
        </div>

        <div class="rounded-[28px] bg-[#0B1E3D] p-5 ring-1 ring-white/10">
          <div class="flex items-center justify-between gap-4">
            <div>
              <div class="text-sm uppercase tracking-[.24em] text-slate-500">Leave Days</div>
              <div class="mt-3 text-3xl font-semibold text-white">4</div>
            </div>
            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-amber-500/10 text-amber-300">
              <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 7V3h8v4M4 11h16M8 21h8"/></svg>
            </div>
          </div>
        </div>

        <div class="rounded-[28px] bg-[#0B1E3D] p-5 ring-1 ring-white/10">
          <div class="flex items-center justify-between gap-4">
            <div>
              <div class="text-sm uppercase tracking-[.24em] text-slate-500">Total Days</div>
              <div class="mt-3 text-3xl font-semibold text-white">24</div>
            </div>
            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-emerald-500/10 text-emerald-300">
              <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5v14"/></svg>
            </div>
          </div>
        </div>
      </section>

      <section class="rounded-[32px] bg-[#0B1E3D] p-6 ring-1 ring-white/10">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
          <div>
            <h2 class="text-2xl font-semibold text-white">Recent Attendance</h2>
            <p class="mt-2 text-sm text-slate-400">Recent entries are shown here for reference.</p>
          </div>
          <div class="flex flex-wrap gap-2">
            <button class="rounded-full bg-slate-800/80 px-4 py-2 text-sm text-slate-200">Filter</button>
            <button class="rounded-full bg-slate-800/80 px-4 py-2 text-sm text-slate-200">Export</button>
          </div>
        </div>
        <div class="mt-5 overflow-hidden rounded-[28px] border border-white/10">
          <table class="min-w-full border-collapse bg-[#0B1E3D] text-left text-sm text-slate-200">
            <thead class="bg-white/5 text-slate-400">
              <tr>
                <th class="px-5 py-4">Date</th>
                <th class="px-5 py-4">Status</th>
                <th class="px-5 py-4">Time In</th>
                <th class="px-5 py-4">Time Out</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-t border-white/10 hover:bg-white/5">
                <td class="px-5 py-4">2026-07-23</td>
                <td class="px-5 py-4 text-emerald-300">Present</td>
                <td class="px-5 py-4">08:45</td>
                <td class="px-5 py-4">17:15</td>
              </tr>
              <tr class="border-t border-white/10 hover:bg-white/5">
                <td class="px-5 py-4">2026-07-22</td>
                <td class="px-5 py-4 text-emerald-300">Present</td>
                <td class="px-5 py-4">08:50</td>
                <td class="px-5 py-4">17:10</td>
              </tr>
              <tr class="border-t border-white/10 hover:bg-white/5">
                <td class="px-5 py-4">2026-07-21</td>
                <td class="px-5 py-4 text-rose-300">Absent</td>
                <td class="px-5 py-4">�</td>
                <td class="px-5 py-4">�</td>
              </tr>
              <tr class="border-t border-white/10 hover:bg-white/5">
                <td class="px-5 py-4">2026-07-20</td>
                <td class="px-5 py-4 text-amber-300">Leave</td>
                <td class="px-5 py-4">�</td>
                <td class="px-5 py-4">�</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </main>
</body>
</html>
