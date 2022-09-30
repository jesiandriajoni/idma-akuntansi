<table border="1">
    <tr>
        <td colspan="2">Penerimaan Kas</td>
    </tr>
    @foreach ($jumums['kas_masuk']['items'] as $item)
        <tr>
            <td>
                {{ $item['data']['deskripsi'] }}
            </td>
            <td>
                {{ $item['data']['debit'] + $item['data']['kredit'] }}
            </td>
        </tr>
    @endforeach
    <tr>
        <td>Total</td>
        <td>{{ $jumums['kas_masuk']['total'] }}</td>
    </tr>
    <tr>
        <td colspan="2">=========================</td>
    </tr>
    <tr>
        <td colspan="2">Pengeluaran Kas</td>
    </tr>
    @foreach ($jumums['kas_keluar']['items'] as $item)
        <tr>
            <td>
                {{ $item['data']['deskripsi'] }}
            </td>
            <td>
                {{ $item['data']['debit'] + $item['data']['kredit'] }}
            </td>
        </tr>
    @endforeach
    <tr>
        <td>Total</td>
        <td>{{ $jumums['kas_keluar']['total'] }}</td>
    </tr>
    <tr>
        <td>Kas Bersih</td>
        <td>{{ $jumums['kas_masuk']['total'] - $jumums['kas_keluar']['total'] }}</td>
    </tr>
    <tr>
        <td colspan="2">=========================</td>
    </tr>
    <tr>
        <td colspan="2">=========================</td>
    </tr>
    <tr>
        <td colspan="2">Investasi</td>
    </tr>
    @foreach ($jumums['investasi']['items'] as $item)
        <tr>
            <td>
                {{ $item['data']['deskripsi'] }}
            </td>
            <td>
                {{ $item['data']['debit'] + $item['data']['kredit'] }}
            </td>
        </tr>
    @endforeach
     <tr>
        <td>Total</td>
        <td>{{ $jumums['investasi']['total'] }}</td>
    </tr>
    <tr>
        <td colspan="2">=========================</td>
    </tr>
    <tr>
        <td colspan="2">Pendanaan</td>
    </tr>
    @foreach ($jumums['pendanaan']['items'] as $item)
        <tr>
            <td>
                {{ $item['data']['deskripsi'] }}
            </td>
            <td>
                {{ $item['data']['debit'] + $item['data']['kredit'] }}
            </td>
        </tr>
    @endforeach
     <tr>
        <td>Total</td>
        <td>{{ $jumums['pendanaan']['total'] }}</td>
    </tr>
     <tr>
        <td>Kas Bersih</td>
        <td>{{ $jumums['kas_masuk']['total'] -$jumums['kas_keluar']['total'] -$jumums['investasi']['total'] +$jumums['pendanaan']['total'] }}
        </td>
    </tr>
    <tr>
        <td colspan="2">=========================</td>
    </tr>
</table>
