<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request Details</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

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
        .section-header {
            background: rgba(255, 255, 255, 0.04);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .info-col + .info-col {
            border-left: 1px solid rgba(255, 255, 255, 0.08);
        }

        textarea::placeholder {
            color: #6b84ad;
        }
    </style>
</head>

<body class="font-sans bg-[#18386d] text-white m-0 p-0 min-h-screen">

    @include('partials.navbar')

    <div class="w-[96.82%] max-w-[1100px] mx-auto py-6">

        <!-- Back link -->
        <a href="{{ route('reports-analytics.leave') }}"
           class="inline-flex items-center gap-2 bg-[#0B1E3D] hover:bg-[#0e254a] transition-colors rounded-full px-4 py-2 text-[11px] font-semibold uppercase tracking-wide text-white mb-5">
            <i class="fa-solid fa-arrow-left text-[11px]"></i>
            Leave Request Details
        </a>

        <!-- Main card -->
        <div class="bg-[#0B1E3D] rounded-[20px] border border-white/[0.06] p-6">

            <div class="text-[15px] font-bold mb-5">
                LEAVE REQUEST ID:
                <span class="text-[#4E8CFF] font-bold">#{{ $leave->reference_id ?? 'LR-2026-0061' }}</span>
            </div>

            <!-- PROFILE -->
            <div class="rounded-[12px] border border-white/[0.08] overflow-hidden mb-4">
                <div class="section-header flex items-center gap-2 px-4 py-3">
                    <i class="fa-regular fa-user text-[12px] text-[#93abd3]"></i>
                    <span class="text-[11px] font-semibold uppercase tracking-wide text-[#E7F0FF]">Profile</span>
                </div>
                <div class="grid grid-cols-4">
                    <div class="info-col px-5 py-4">
                        <div class="text-[10.5px] font-semibold text-white mb-1">Eployee ID</div>
                        <div class="text-[11.5px] text-[#93abd3]">{{ $employee->employee_id ?? 'EMP-10045' }}</div>
                    </div>
                    <div class="info-col px-5 py-4">
                        <div class="text-[10.5px] font-semibold text-white mb-1">Name</div>
                        <div class="text-[11.5px] text-[#93abd3]">{{ $employee->name ?? 'Yohan Evidor' }}</div>
                    </div>
                    <div class="info-col px-5 py-4">
                        <div class="text-[10.5px] font-semibold text-white mb-1">Department</div>
                        <div class="text-[11.5px] text-[#93abd3]">{{ $employee->department ?? 'Marketing' }}</div>
                    </div>
                    <div class="info-col px-5 py-4">
                        <div class="text-[10.5px] font-semibold text-white mb-1">Position</div>
                        <div class="text-[11.5px] text-[#93abd3]">{{ $employee->position ?? 'Marketing Executive' }}</div>
                    </div>
                </div>
            </div>

            <!-- LEAVE INFORMATION -->
            <div class="rounded-[12px] border border-white/[0.08] overflow-hidden mb-4">
                <div class="section-header flex items-center gap-2 px-4 py-3">
                    <i class="fa-regular fa-calendar text-[12px] text-[#93abd3]"></i>
                    <span class="text-[11px] font-semibold uppercase tracking-wide text-[#E7F0FF]">Leave Information</span>
                </div>
                <div class="grid grid-cols-4">
                    <div class="info-col px-5 py-4">
                        <div class="text-[10.5px] font-semibold text-white mb-1">Leave Type</div>
                        <div class="text-[11.5px] text-[#93abd3]">{{ $leave->type ?? 'Vacation Leave' }}</div>
                    </div>
                    <div class="info-col px-5 py-4">
                        <div class="text-[10.5px] font-semibold text-white mb-2">From</div>
                        <div class="flex items-center gap-2 text-[11.5px] text-white font-semibold">
                            <i class="fa-regular fa-calendar text-[10px] text-[#93abd3]"></i>
                            {{ $leave->from_date ?? 'June 02, 2026' }}
                        </div>
                        <div class="text-[10px] text-[#6b84ad] mt-1">({{ $leave->from_day ?? 'Tuesday' }})</div>
                    </div>
                    <div class="info-col px-5 py-4">
                        <div class="text-[10.5px] font-semibold text-white mb-2">To</div>
                        <div class="flex items-center gap-2 text-[11.5px] text-white font-semibold">
                            <i class="fa-regular fa-calendar text-[10px] text-[#93abd3]"></i>
                            {{ $leave->to_date ?? 'June 06, 2026' }}
                        </div>
                        <div class="text-[10px] text-[#6b84ad] mt-1">({{ $leave->to_day ?? 'Saturday' }})</div>
                    </div>
                    <div class="info-col px-5 py-4">
                        <div class="text-[10.5px] font-semibold text-white mb-1">Total</div>
                        <div class="text-[16px] font-bold text-[#4E8CFF]">{{ $leave->total_days ?? '5' }} Days</div>
                    </div>
                </div>
            </div>

            <!-- ATTACHMENTS + APPROVAL STATUS -->
            <div class="grid grid-cols-2 gap-4 mb-4">

                <div class="rounded-[12px] border border-white/[0.08] overflow-hidden">
                    <div class="section-header flex items-center gap-2 px-4 py-3">
                        <i class="fa-solid fa-paperclip text-[12px] text-[#93abd3]"></i>
                        <span class="text-[11px] font-semibold uppercase tracking-wide text-[#E7F0FF]">Attachments</span>
                    </div>
                    <div class="p-4 space-y-3">
                        @forelse (($attachments ?? []) as $file)
                            <div class="flex items-center gap-3 bg-white/[0.03] rounded-lg px-3 py-2.5">
                                <div class="w-8 h-8 rounded-md flex items-center justify-center flex-none {{ str_ends_with($file->name, '.pdf') ? 'bg-red-500/20' : 'bg-blue-500/20' }}">
                                    <i class="fa-solid {{ str_ends_with($file->name, '.pdf') ? 'fa-file-pdf text-red-400' : 'fa-file-lines text-blue-300' }} text-[13px]"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-[11.5px] text-white truncate">{{ $file->name }}</div>
                                    <div class="text-[10px] text-[#6b84ad]">{{ $file->size }}</div>
                                </div>
                                <a href="{{ $file->url }}" class="text-[#93abd3] hover:text-white transition-colors">
                                    <i class="fa-solid fa-download text-[12px]"></i>
                                </a>
                            </div>
                        @empty
                            <div class="flex items-center gap-3 bg-white/[0.03] rounded-lg px-3 py-2.5">
                                <div class="w-8 h-8 rounded-md bg-red-500/20 flex items-center justify-center flex-none">
                                    <i class="fa-solid fa-file-pdf text-red-400 text-[13px]"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-[11.5px] text-white truncate">Vacation_Plan.pdf</div>
                                    <div class="text-[10px] text-[#6b84ad]">245 KB</div>
                                </div>
                                <a href="#" class="text-[#93abd3] hover:text-white transition-colors">
                                    <i class="fa-solid fa-download text-[12px]"></i>
                                </a>
                            </div>
                            <div class="flex items-center gap-3 bg-white/[0.03] rounded-lg px-3 py-2.5">
                                <div class="w-8 h-8 rounded-md bg-blue-500/20 flex items-center justify-center flex-none">
                                    <i class="fa-solid fa-file-lines text-blue-300 text-[13px]"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-[11.5px] text-white truncate">Letter.docx</div>
                                    <div class="text-[10px] text-[#6b84ad]">245 KB</div>
                                </div>
                                <a href="#" class="text-[#93abd3] hover:text-white transition-colors">
                                    <i class="fa-solid fa-download text-[12px]"></i>
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="rounded-[12px] border border-white/[0.08] overflow-hidden">
                    <div class="section-header flex items-center gap-2 px-4 py-3">
                        <i class="fa-regular fa-clipboard text-[12px] text-[#93abd3]"></i>
                        <span class="text-[11px] font-semibold uppercase tracking-wide text-[#E7F0FF]">Approval Status</span>
                    </div>
                    <div class="p-4">
                        @php
                            $status = $leave->status ?? 'pending';
                            $statusMap = [
                                'pending'  => ['icon' => 'fa-clock',        'color' => 'text-amber-400',  'bg' => 'bg-amber-400/10', 'label' => 'PENDING APPROVAL', 'note' => 'Your request is awaiting approval.'],
                                'approved' => ['icon' => 'fa-circle-check', 'color' => 'text-green-400',  'bg' => 'bg-green-400/10', 'label' => 'APPROVED',         'note' => 'Your request has been approved.'],
                                'rejected' => ['icon' => 'fa-circle-xmark', 'color' => 'text-red-400',    'bg' => 'bg-red-400/10',   'label' => 'REJECTED',         'note' => 'Your request has been rejected.'],
                            ];
                            $s = $statusMap[$status] ?? $statusMap['pending'];
                        @endphp
                        <div class="flex items-start gap-3 {{ $s['bg'] }} rounded-lg px-4 py-4">
                            <i class="fa-solid {{ $s['icon'] }} {{ $s['color'] }} text-[16px] mt-0.5"></i>
                            <div>
                                <div class="text-[12px] font-bold {{ $s['color'] }} tracking-wide">{{ $s['label'] }}</div>
                                <div class="text-[10.5px] text-[#93abd3] mt-1">{{ $leave->status_note ?? $s['note'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- HR REMARKS -->
            <form method="POST" action="{{ route('reports-analytics.leave.review', $leave->id ?? 0) }}">
                @csrf
                <div class="rounded-[12px] border border-white/[0.08] overflow-hidden">
                    <div class="section-header flex items-center gap-2 px-4 py-3">
                        <i class="fa-regular fa-comment-dots text-[12px] text-[#93abd3]"></i>
                        <span class="text-[11px] font-semibold uppercase tracking-wide text-[#E7F0FF]">HR Remarks</span>
                    </div>
                    <div class="p-4 flex items-center gap-3">
                        <textarea
                            name="remarks"
                            rows="1"
                            placeholder="Enter remarks here..."
                            class="flex-1 resize-none bg-[#0f2447] border border-white/[0.08] rounded-lg px-3.5 py-2.5 text-[11.5px] text-white outline-none focus:border-[#4E8CFF]/50"
                        >{{ old('remarks') }}</textarea>

                        <button type="submit" name="action" value="accept"
                            class="flex items-center gap-2 bg-green-600 hover:bg-green-700 transition-colors text-white text-[11.5px] font-semibold px-4 py-2.5 rounded-lg">
                            <i class="fa-solid fa-check text-[10px]"></i> Accept
                        </button>

                        <button type="submit" name="action" value="reject"
                            class="flex items-center gap-2 bg-red-600 hover:bg-red-700 transition-colors text-white text-[11.5px] font-semibold px-4 py-2.5 rounded-lg">
                            <i class="fa-solid fa-xmark text-[10px]"></i> Reject
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</body>

</html>