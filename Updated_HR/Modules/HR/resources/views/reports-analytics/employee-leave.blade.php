<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

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
        body { font-family: 'Inter', sans-serif; }

        .status-badge {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 9999px;
            font-size: 0.65rem;
            font-weight: 500;
            background: rgba(255, 255, 255, .06);
        }
        .status-badge.approved { color: #34d399; }
        .status-badge.rejected { color: #fb7185; }
        .status-badge.pending  { color: #fbbf24; }

        .field-input::placeholder { color: #6b85b3; }
    </style>
</head>

<body class="bg-[#0d2549] text-white min-h-screen pb-6">

  @include('partials.employee-navbar')

    <div class="w-full flex flex-col gap-4">

        <!-- Form card: full width -->
        <form class="w-full bg-[#122f5c] rounded-2xl p-6">

            <!-- Leave Type -->
            <div class="mb-5">
                <label class="block text-[12px] text-[#93abd3] mb-2">Leave Type</label>
                <div class="relative">
                    <i class="fa-regular fa-user absolute left-4 top-1/2 -translate-y-1/2 text-[#6b85b3] text-[13px]"></i>
                    <select class="field-input w-full appearance-none bg-[#0B1E3D] rounded-lg pl-11 pr-11 py-3 text-[13px] text-[#93abd3] focus:outline-none focus:ring-1 focus:ring-[#3b6fd4]">
                        <option value="" selected disabled>Select leave type</option>
                        <option value="vacation">Vacation Leave</option>
                        <option value="sick">Sick Leave</option>
                        <option value="emergency">Emergency Leave</option>
                        <option value="unpaid">Unpaid Leave</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-[#6b85b3] text-[11px] pointer-events-none"></i>
                </div>
            </div>

            <!-- Start / End / Documents -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
                <div>
                    <label class="block text-[12px] text-[#93abd3] mb-2">Start Date</label>
                    <div class="relative">
                        <i class="fa-regular fa-calendar absolute left-4 top-1/2 -translate-y-1/2 text-[#6b85b3] text-[13px]"></i>
                        <input type="date" placeholder="Select start type"
                            class="field-input w-full bg-[#0B1E3D] rounded-lg pl-11 pr-4 py-3 text-[13px] text-[#93abd3] focus:outline-none focus:ring-1 focus:ring-[#3b6fd4]">
                    </div>
                </div>

                <div>
                    <label class="block text-[12px] text-[#93abd3] mb-2">End Date</label>
                    <div class="relative">
                        <i class="fa-regular fa-calendar absolute left-4 top-1/2 -translate-y-1/2 text-[#6b85b3] text-[13px]"></i>
                        <input type="date" placeholder="Select end type"
                            class="field-input w-full bg-[#0B1E3D] rounded-lg pl-11 pr-4 py-3 text-[13px] text-[#93abd3] focus:outline-none focus:ring-1 focus:ring-[#3b6fd4]">
                    </div>
                </div>

                <div>
                    <label class="block text-[12px] text-[#93abd3] mb-2">Supporting Documents</label>
                    <label class="relative cursor-pointer block">
                        <i class="fa-solid fa-arrow-down-to-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6b85b3] text-[13px]"></i>
                        <span class="field-input w-full block bg-[#0B1E3D] rounded-lg pl-11 pr-4 py-3 text-[13px] text-[#93abd3]">Click to upload files</span>
                        <input type="file" class="hidden" multiple>
                    </label>
                </div>
            </div>

            <!-- Reason -->
            <div>
                <label class="block text-[12px] text-[#93abd3] mb-2">Reason</label>
                <div class="relative">
                    <textarea id="reason" maxlength="500" rows="5" placeholder="Please provide the reason for your leave..."
                        class="field-input w-full bg-[#0B1E3D] rounded-lg px-4 py-3 text-[13px] text-[#93abd3] resize-none focus:outline-none focus:ring-1 focus:ring-[#3b6fd4]"
                        oninput="document.getElementById('charCount').textContent = this.value.length + ' / 500'"></textarea>
                    <span id="charCount" class="absolute right-4 bottom-3 text-[11px] text-[#6b85b3]">0 / 500</span>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex justify-end mt-5">
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-[#3b6fd4] hover:bg-[#4a7de0] transition-colors text-white text-[13px] font-medium px-6 py-3 rounded-lg">
                    <i class="fa-regular fa-paper-plane"></i>
                    Submit Request
                </button>
            </div>
        </form>

        <!-- Bottom row: table (left) + Leave Guidelines (right), aligned side by side -->
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_360px] gap-4 items-start">

            <!-- Table card -->
            <div class="bg-[#122f5c] rounded-2xl p-6">
                <h3 class="text-[14px] font-semibold mb-4">My Leave Request</h3>

                <div class="rounded-lg overflow-hidden">
                    <table class="w-full border-collapse text-[12.5px]">
                        <thead>
                            <tr class="bg-[#0B1E3D]">
                                <th class="text-center font-light text-white/90 px-4 py-3">Leave Type</th>
                                <th class="text-center font-light text-white/90 px-4 py-3">Date</th>
                                <th class="text-center font-light text-white/90 px-4 py-3">Duration</th>
                                <th class="text-center font-light text-white/90 px-4 py-3">Reason</th>
                                <th class="text-center font-light text-white/90 px-4 py-3">Status</th>
                                <th class="text-center font-light text-white/90 px-4 py-3">Filled On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center px-4 py-3 text-[#c9d8f2]">Vacation Leave</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">May 12, 2026</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">5 Days</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">Family Vacation</td>
                                <td class="text-center px-4 py-3"><span class="status-badge approved">Approved</span></td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">Jun, 20 2026</td>
                            </tr>
                            <tr class="bg-white/[0.02]">
                                <td class="text-center px-4 py-3 text-[#c9d8f2]">Vacation Leave</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">May 12, 2026</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">5 Days</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">Family Vacation</td>
                                <td class="text-center px-4 py-3"><span class="status-badge approved">Approved</span></td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">Jun, 20 2026</td>
                            </tr>
                            <tr>
                                <td class="text-center px-4 py-3 text-[#c9d8f2]">Vacation Leave</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">May 12, 2026</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">5 Days</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">Family Vacation</td>
                                <td class="text-center px-4 py-3"><span class="status-badge approved">Approved</span></td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">Jun, 20 2026</td>
                            </tr>
                            <tr class="bg-white/[0.02]">
                                <td class="text-center px-4 py-3 text-[#c9d8f2]">Vacation Leave</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">May 12, 2026</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">5 Days</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">Family Vacation</td>
                                <td class="text-center px-4 py-3"><span class="status-badge rejected">Rejected</span></td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">Jun, 20 2026</td>
                            </tr>
                            <tr>
                                <td class="text-center px-4 py-3 text-[#c9d8f2]">Vacation Leave</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">May 12, 2026</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">5 Days</td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">Family Vacation</td>
                                <td class="text-center px-4 py-3"><span class="status-badge pending">Pending</span></td>
                                <td class="text-center px-4 py-3 text-[#93abd3]">Jun, 20 2026</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Leave Guidelines -->
            <div class="bg-[#122f5c] rounded-2xl p-6">
                <h3 class="text-[14px] font-semibold mb-5">Leave Guidelines</h3>
                <ul class="space-y-5">
                    <li class="flex gap-3">
                        <span class="mt-[7px] w-[5px] h-[5px] rounded-full bg-[#93abd3] shrink-0"></span>
                        <span class="text-[12.5px] text-[#93abd3] leading-relaxed">Submit your leave request at least 2 working days in advance.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-[7px] w-[5px] h-[5px] rounded-full bg-[#93abd3] shrink-0"></span>
                        <span class="text-[12.5px] text-[#93abd3] leading-relaxed">Half-day leave is counted as 0.5 day.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-[7px] w-[5px] h-[5px] rounded-full bg-[#93abd3] shrink-0"></span>
                        <span class="text-[12.5px] text-[#93abd3] leading-relaxed">Leave will be approved by your immediate supervisor.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-[7px] w-[5px] h-[5px] rounded-full bg-[#93abd3] shrink-0"></span>
                        <span class="text-[12.5px] text-[#93abd3] leading-relaxed">Check your leave balance before filing a request.</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</body>

</html>