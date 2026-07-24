<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Employee Onboarding</title>

<!-- Google Font: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
  }
</script>
</head>

 @include('partials.navbar')
<body class="bg-[#1B3A6B] min-h-screen font-sans">
    
<h1 class="text-white pt-[20px] pl-[100px] text-[28px] font-bold tracking-wide mb-8 text-left">EMPLOYEE ONBOARDING</h1>

  <div class="pt-[24px]">
    <!-- Employee Onboarding Content -->

<div class="max-w-7xl mx-auto">

   <!-- Title -->

    @include('partials.onboarding-stepper', ['currentStep' => 2])

<div class="flex flex-col lg:flex-row gap-12">

      <!-- Left: form -->
      <div class="flex-1">
        <h2 class="text-white text-sm font-bold tracking-wide mb-4">
    EMPLOYMENT INFORMATION
</h2>

@if ($errors->any())
    <div class="mb-4 rounded bg-red-500/20 border border-red-400 text-red-200 px-4 py-3 text-sm">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form 
 action="{{ route('onboarding.storeStep2') }}"
    method="POST"
    class="space-y-6 max-w-3xl" >

    @csrf

    <!-- Top Row -->
    <!-- Top Row -->
<div class="flex gap-6">

    <!-- Department -->
    <div>
        <label class="block text-slate-300 text-xs mb-1">
            Department <span class="text-red-500">*</span>
        </label>
        <select id="department" name="department" required class="w-[630px] h-[40px] bg-[#0d1730] text-white text-sm rounded px-3 outline-none focus:ring-1 focus:ring-blue-500">
            <option value="">Select Department</option>
            <option>Business Intelligence</option>
            <option>E-commerce</option>
            <option>Finance</option>
            <option>Human Resources</option>
            <option>IT Service Management</option>
            <option>Inventory Management</option>
            <option>Order Management</option>
            <option>Procurement Management</option>
            <option>Production Management</option>
        </select>
    </div>

    <!-- Position -->
    <div>
        <label class="block text-slate-300 text-xs mb-1">
            Position <span class="text-red-500">*</span>
        </label>
        <select id="position" name="position" required class="w-[630px] h-[40px] bg-[#0d1730] text-white text-sm rounded px-3 outline-none focus:ring-1 focus:ring-blue-500">
            <option value="">Select Department First</option>
        </select>
    </div>

</div>

<!-- Bottom Row -->
<div class="flex gap-6">

    <!-- Hire Date -->
    <div>
        <label class="block text-slate-300 text-xs mb-1">
            Hire Date <span class="text-red-500">*</span>
        </label>
        <input
        name="hire_date"
            type="date"
            required
            value="{{ old('hire_date', session('step2.hire_date')) }}"
            class="w-[412px] h-[40px] bg-[#0d1730] text-white text-sm rounded px-3 outline-none focus:ring-1 focus:ring-blue-500"
        />
    </div>

    <div>
        <label class="block text-slate-300 text-xs mb-1">
            Start Time <span class="text-red-500">*</span>
        </label>
        <input
            name="start_time"
            type="time"
            required
            value="{{ old('start_time', session('step2.start_time')) }}"
            class="w-[412px] h-[40px] bg-[#0d1730] text-white text-sm rounded px-3 outline-none focus:ring-1 focus:ring-blue-500"
        />
        <p class="mt-1 text-[10px] text-slate-400">HR assigned work start (basis for late check)</p>
    </div>

    <div>
        <label class="block text-slate-300 text-xs mb-1">
            End Time <span class="text-red-500">*</span>
        </label>
        <input
            name="end_time"
            type="time"
            required
            value="{{ old('end_time', session('step2.end_time')) }}"
            class="w-[412px] h-[40px] bg-[#0d1730] text-white text-sm rounded px-3 outline-none focus:ring-1 focus:ring-blue-500"
        />
        <p class="mt-1 text-[10px] text-slate-400">Required work hours = End Time − Start Time</p>
    </div>


</div>


    

    <!-- Navigation Buttons -->
<div class="pt-6 flex gap-4">

    <!-- Back Button -->
   <div class="pt-8">
           <button
    type="button"
    onclick="window.location.href='{{ route('onboarding.step1') }}'"
    class="w-[218px] h-[56px] border-0 border-[0.1px] border-[#dcdcdc54] rounded-md bg-[#C3326720] text-white text-[0.9375rem] font-normal tracking-[.3px] cursor-pointer shadow-[0_8px_20px_rgba(0,0,0,.25)] transition-all duration-250 hover:bg-[#C3326740] hover:-translate-y-0.5 active:scale-[.97]"
>
    BACK
</button>
          </div>

   <div class="pt-8">
           <button
    type="submit"
     class="w-[218px] h-[56px] border-0 border-[0.1px] border-[#dcdcdc54] rounded-md bg-[#0061FF20] text-white text-[0.9375rem] font-normal tracking-[.3px] cursor-pointer shadow-[0_8px_20px_rgba(0,0,0,.25)] transition-all duration-250 hover:bg-[#0061FF30] hover:-translate-y-0.5 active:scale-[.97]">
    NEXT

  
</button>
          </div>
</form>
      </div>

     

    </div>
  </div>
  


    </div>

   </div>

<script>
  const positionsByDepartment = {
    "Business Intelligence": ["BI Manager", "BI Staff"],

    "E-commerce": ["E-commerce Manager", "E-commerce Staff"],

    "Finance": ["Finance Manager", "Finance Staff"],

    "Human Resources": ["Human Resources Manager", "Human Resources Staff"],

    "IT Service Management": ["IT Service Manager", "IT Service Staff"],

    "Inventory Management": ["Inventory Manager", "Inventory Staff"],

    "Order Management": ["Order Manager", "Order Staff"],

    "Procurement Management": ["Procurement Manager", "Procurement Staff"],

    "Production Management": ["Production Manager", "Production Staff"]
};

  const departmentSelect = document.getElementById("department");
  const positionSelect = document.getElementById("position");

  departmentSelect.addEventListener("change", function () {
    const selectedDepartment = this.value;
    const positions = positionsByDepartment[selectedDepartment] || [];

    positionSelect.innerHTML = "";

    if (!selectedDepartment) {
      positionSelect.appendChild(new Option("Select Department First", ""));
      return;
    }

    positionSelect.appendChild(new Option("Select Position", ""));
    positions.forEach(function (position) {
      positionSelect.appendChild(new Option(position, position));
    });
  });
</script>

</body>
</html>
