<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee Leave</title>
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
            <h1 class="text-3xl font-semibold text-white">Employee Leave</h1>
            <p class="mt-2 text-sm text-slate-400">Manage leave records with a static design preview.</p>
          </div>
          <div class="flex flex-wrap gap-3">
            <button class="rounded-full bg-slate-800/80 px-4 py-2 text-sm text-slate-200">Request Leave</button>
            <button class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-semibold text-white">Leave Policies</button>
          </div>
        </div>
      </section>

      <section class="grid gap-4 lg:grid-cols-4">
        <div class="rounded-[28px] bg-[#0B1E3D] p-5 ring-1 ring-white/10">
          <div class="text-sm uppercase tracking-[.24em] text-slate-500">Total Leave</div>
          <div class="mt-3 text-3xl font-semibold text-white">12</div>
        </div>
        <div class="rounded-[28px] bg-[#0B1E3D] p-5 ring-1 ring-white/10">
          <div class="text-sm uppercase tracking-[.24em] text-slate-500">Approved</div>
          <div class="mt-3 text-3xl font-semibold text-white">8</div>
        </div>
        <div class="rounded-[28px] bg-[#0B1E3D] p-5 ring-1 ring-white/10">
          <div class="text-sm uppercase tracking-[.24em] text-slate-500">Pending</div>
          <div class="mt-3 text-3xl font-semibold text-white">3</div>
        </div>
        <div class="rounded-[28px] bg-[#0B1E3D] p-5 ring-1 ring-white/10">
          <div class="text-sm uppercase tracking-[.24em] text-slate-500">Declined</div>
          <div class="mt-3 text-3xl font-semibold text-white">1</div>
        </div>
      </section>

      <section class="rounded-[32px] bg-[#0B1E3D] p-6 ring-1 ring-white/10">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
          <div>
            <h2 class="text-2xl font-semibold text-white">Recent Leave Requests</h2>
            <p class="mt-2 text-sm text-slate-400">This preview shows sample leave request entries.</p>
          </div>
          <button class="rounded-full bg-sky-500/20 px-4 py-2 text-sm font-semibold text-sky-200">View All</button>
        </div>

        <div class="mt-5 overflow-hidden rounded-[28px] border border-white/10">
          <table class="min-w-full border-collapse bg-[#0B1E3D] text-left text-sm text-slate-200">
            <thead class="bg-white/5 text-slate-400">
              <tr>
                <th class="px-5 py-4">Leave Type</th>
                <th class="px-5 py-4">Duration</th>
                <th class="px-5 py-4">Status</th>
                <th class="px-5 py-4">Submitted</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-t border-white/10 hover:bg-white/5">
                <td class="px-5 py-4">Vacation</td>
                <td class="px-5 py-4">3 days</td>
                <td class="px-5 py-4 text-emerald-300">Approved</td>
                <td class="px-5 py-4">2026-07-17</td>
              </tr>
              <tr class="border-t border-white/10 hover:bg-white/5">
                <td class="px-5 py-4">Sick Leave</td>
                <td class="px-5 py-4">1 day</td>
                <td class="px-5 py-4 text-amber-300">Pending</td>
                <td class="px-5 py-4">2026-07-20</td>
              </tr>
              <tr class="border-t border-white/10 hover:bg-white/5">
                <td class="px-5 py-4">Personal Leave</td>
                <td class="px-5 py-4">2 days</td>
                <td class="px-5 py-4 text-rose-300">Declined</td>
                <td class="px-5 py-4">2026-07-08</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </main>
</body>
</html>
