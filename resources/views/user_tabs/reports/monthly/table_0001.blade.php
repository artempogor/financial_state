<form id="create" action="/1" method="POST">
@csrf
    <table class="min-w-full bg-white border-solid border-2 ">

    <thead class="bg-gray-900 text-white  ">
    <tr>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Отчётный период</th>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Проверено</th>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Загруженно</th>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Отправлено</td>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Принято</td>
    </tr>
    </thead>
    <tbody class="text-gray-700 ">
    <tr>
        <td class="text-left py-3 px-4">cентябрь 2021 г.</td>
        <td class="text-left py-3 px-4"></td>
        <td class="text-left py-3 px-4">✔</td>
        <td class="text-left py-3 px-4"></td>
        <td class="text-left py-3 px-4">✔</td>
    </tr>
    <tr class="bg-gray-100">
        <td class="text-left py-3 px-4">октябрь 2021 г.</td>
        <td class="text-left py-3 px-4"></td>
        <td class="text-left py-3 px-4">✔</td>
        <td class="text-left py-3 px-4">✔</td>
        <td class="text-left py-3 px-4">✔</td>
    </tr>
    <tr>

        <td class="text-left py-3 px-4">ноябрь 2021 г.</td>
        <td class="text-left py-3 px-4">✔</td>
        <td class="text-left py-3 px-4">✔</td>
        <td class="text-left py-3 px-4">✔</td>
        <td class="text-left py-3 px-4">✔</td>
    </tr>
    </tbody>
</table>
</form>
