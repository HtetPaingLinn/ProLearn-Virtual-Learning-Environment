
<div class="w-full max-w-5xl mx-auto px-5 pb-3 gap-7 columns-2 space-y-5">
    <form action="/create_teacher" method="post">
        @csrf
        <div class="bg-white shadow rounded-lg px-6 py-6 mb-5 h-[330px]">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Teacher Information</h2>
            <div class="mb-4">
                <label for="teacher_name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name='teacher_name' id="teacher_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Enter teacher's name">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name='email' id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Enter teacher's mail">
            </div>
        </div>
        <div class="bg-white shadow rounded-lg p-6 mb-5 h-[260px]">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Department Info</h2>
            <div class="mb-4">
                <label for="department_name" class="block text-sm font-medium text-gray-700"> Name </label>
                <select name="department_name" id="department_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                    <option value="1">Faculty of Computer Science</option>
                    <option value="2">Faculty of Information Science</option>
                    <option value="3">Faculty of Computer System and Technology</option>
                    <option value="4">Faculty 1st Year</option>
                    <option value="5">Faculty 2nd Year</option>
                    <option value="6">Extra</option>
                </select>
            </div>
        </div>
        <div class="h-48"></div>
        <div class="bg-white shadow rounded-lg p-6 mb-5 h-[420px]">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Password</h2>
            <div class="mb-4 relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Enter default password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pr-10" />
                    <button type="button" id="toggle_password" class="absolute inset-y-0 right-0 flex items-center px-3" onclick="togglePassword('password')">
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white shadow rounded-lg p-6 h-[420px] mb-5">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Phone Number</h2>
            <div class="mb-4 relative">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <div class="relative">
                    <input type="text" id="phone" name="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pr-10" />
                </div>
            </div>
        </div>
        <button id="edit_btn" type="submit" class="mt-4 inline-flex items-center w-28 justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">Save</button>
    </form>


    <div class="h-[200px]"></div>

</div>

<script>

    function togglePassword(id) {
        var x = document.getElementById(id);
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
