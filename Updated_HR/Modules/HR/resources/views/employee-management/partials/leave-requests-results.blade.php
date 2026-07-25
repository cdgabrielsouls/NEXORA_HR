<div class="w-full max-w-[1859px] mx-auto bg-[#0B1E3D] rounded-[10px] overflow-x-hidden">
    <table class="w-full table-fixed border-collapse">
        <colgroup>
            <col style="width:24%">
            <col style="width:16%">
            <col style="width:14%">
            <col style="width:16%">
            <col style="width:18%">
            <col style="width:12%">
        </colgroup>
        <tbody>
            @forelse($leaveRequests as $leave)
                <tr class="border-t border-white/[0.18] transition-colors duration-[250ms] hover:bg-[#21457f]">
                    <td class="p-4 text-[0.84375rem] text-center border-r border-white/[0.12] font-extralight">
                        @php
                            $employee = $leave->employee;
                            $genderClass = match(strtolower($employee->gender ?? '')) {
                                'female' => 'text-[#ff8bd2]',
                                'male' => 'text-[#6ea9ff]',
                                default => 'text-white',
                            };
                        @endphp
                       
                        {{ $employee->first_name }} {{ $employee->last_name }}
                        <span class="block text-[0.65rem] text-[#93abd3] font-light mt-0.5">{{ '2026' . str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td class="p-4 text-[0.84375rem] text-center border-r border-white/[0.12] font-extralight">{{ $employee->department }}</td>
                    <td class="p-4 text-[0.84375rem] text-center border-r border-white/[0.12] font-extralight ">{{ $leave->created_at->format('M d, Y') }}</td>
                    <td class="p-4 text-[0.84375rem] text-center border-r border-white/[0.12] font-extralight ">{{ ucfirst($leave->type) }}</td>
                    <td class="p-4 text-[0.84375rem] text-center border-r border-white/[0.12] font-extralight">
                        <span class="status-badge {{ $leave->status }}">{{ strtoupper($leave->status) }}</span>
                    </td>
                    <td class="p-3 text-[0.84375rem] text-center font-extralight">
                        <a href="{{ route('leave-requests.show', $leave->id) }}" class="inline-block bg-[#132B52] text-white no-underline px-3 py-1.5 rounded-xl text-[0.6875rem] transition-all duration-[250ms] hover:bg-[#2e5ca3] hover:-translate-y-px">
                            View
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-[30px] text-center text-[#b9c8e8] text-sm">
                        No leave requests found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@include('partials.list-pagination', ['paginator' => $leaveRequests, 'label' => 'leave requests'])