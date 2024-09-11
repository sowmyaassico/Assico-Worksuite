<table>
    <tr>
        <th>@lang('app.date')</th>
        <th colspan="5" align="center">{{ $startDate . ' ' .__('app.to') . ' ' . $endDate }}</th>
    </tr>
</table>
<table>
    <tr>
        <th>@lang('app.name')</th>
        <th align="center">@lang('modules.timeLogs.totalWorkingHours')</th>
        <th align="center">@lang('modules.timeLogs.totalLoggedHours')</th>
        <th align="center">@lang('modules.timeLogs.totalNotLoggedHours')</th>
        <th align="center">@lang('modules.timeLogs.leavesTaken')</th>
        <th align="center">@lang('modules.timeLogs.holiday')</th>
    </tr>
    @foreach ($employees as $item)
        @php
            $totalWorkingHours = $item->total_working_days*8;
            $totalWorkingMinutes = $item->total_working_days*8*60;
            $totalUntrackedHours = $totalWorkingMinutes - $item->total_minutes;
        @endphp
        <tr>
            <td>{{ $item->name }}</td>
            <td align="center">{{ $totalWorkingHours . ' hr'}} </td>
            <td align="center">
                @if ($item->total_minutes == 0)
                    0
                @else
                    {{ ((intdiv($item->total_minutes , 60) > 0) ? intdiv($item->total_minutes , 60) .' hr ' : '') .((($item->total_minutes % 60) > 0 && intdiv($item->total_minutes , 60) > 0) ? ' ' : ''). ((($item->total_minutes % 60) > 0) ? (($item->total_minutes % 60 <=1 ) ? ($item->total_minutes % 60) .' minute' : ($item->total_minutes % 60) .' minutes') : '') }}
                @endif
            </td>
            <td align="center">{{ ((intdiv($totalUntrackedHours , 60) > 0) ? intdiv($totalUntrackedHours , 60) .' hr ' : '') .((($totalUntrackedHours % 60) > 0 && intdiv($totalUntrackedHours , 60) > 0) ? ' ' : ''). ((($totalUntrackedHours % 60) > 0) ? (($totalUntrackedHours % 60 <=1 ) ? ($totalUntrackedHours % 60) .' minute' : ($totalUntrackedHours % 60) .' minutes') : '') }}</td>
            <td align="center">{{ optional($item)->total_leaves ?? 0 }}</td>
            <td align="center">{{ $item->holidays->count() }}</td>
        </tr>
    @endforeach
</table>
