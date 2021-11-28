@if(count($reports))
<form id="create" action="/reports_local_create" method="POST">
        @csrf
    <table class="min-w-full bg-white border-solid border-2 ">
    <thead class="bg-gray-900 text-white  ">
    <tr>
        <th class="px-1 py-1"></th>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Отчёт</th>
        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Дата Сохранения</th>
    </tr>
    </thead>
    <tbody class="text-gray-700 ">
    @foreach($reports as $report)
    <tr>
        <td class="text-left py-3 px-4">
            <label class="inline-flex items-center mt-3">
                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"  name="reportsave[]" value="{{$report->name_report}}">
            </label>
        </td>
        <td class="text-left py-3 px-4">{{$report->name_report}}</td>
        <td class="text-left py-3 px-4">{{$report->updated_at}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
    </form>
@else
    <p class="md:text-center text-2xl p-5">Нет сохранённых отчётов</p>
@endif
