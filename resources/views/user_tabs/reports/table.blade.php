<form id="create" action="/reports_create" method="POST">
    @csrf
    <table class="min-w-full bg-white border-solid border-2 ">

    <thead class="bg-gray-900 text-white  ">
    <tr>
        <th class="px-1 py-1"></th>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Отчётный период</th>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Проверено</th>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Загруженно</th>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Отправлено</td>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Принято</td>
    </tr>
    </thead>
    <tbody class="text-gray-700 ">
    <tr>
        <td class="text-left py-3 px-4">
            <label class="inline-flex items-center mt-3">
                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"  name="report[]" value="форма 0101">
            </label>
        </td>
        <td class="text-left py-3 px-4">форма 0101</td>
        <td class="text-left py-3 px-4"></td>
        <td class="text-left py-3 px-4"></td>
        <td class="text-left py-3 px-4"></td>
        <td class="text-left py-3 px-4">✔</td>
    </tr>
    <tr class="bg-gray-100">
        <td class="text-left py-3 px-4">
            <label class="inline-flex items-center mt-3">
                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="report[]" value="баланс">
            </label>
        </td>
        <td class="text-left py-3 px-4">баланс</td>
        <td class="text-left py-3 px-4">✔</td>
        <td class="text-left py-3 px-4">✔</td>
        <td class="text-left py-3 px-4">✔</td>
        <td class="text-left py-3 px-4">✔</td>
    </tr>
    <tr>
        <td class="text-left py-3 px-4">
            <label class="inline-flex items-center mt-3">
                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"  name="report[]" value="форма 0102">
            </label>
        </td>
        <td class="text-left py-3 px-4">форма 0102</td>
        <td class="text-left py-3 px-4">✔</td>
        <td class="text-left py-3 px-4">✔</td>
        <td class="text-left py-3 px-4"></td>
        <td class="text-left py-3 px-4"></td>
    </tr>
    </tbody>
</table>
</form>