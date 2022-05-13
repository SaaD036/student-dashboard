<style>
    .table-container{
        width: 100%;
        height: 100%;
        overflow-y: auto;
    }
    .table-head{
        background-color: #05a124;
        color: #ffffff;
    }
    .table-cell{
        text-align: center;
        padding: 15px 0px 15px 0px;
        margin: 10px;
    }
    .button{
        padding: 8px 15px 8px 15px;
        border: none;
        border-radius: 5px;
        color: white;
        cursor: pointer;
        text-decoration: none;
        background-color: #05a124;
    }
</style>

<div class="table-container">
    <table class="table table-striped">
        <thead>
            <tr class="table-head">
                <td class="table-cell" style="width: 15%">From</td>
                <td class="table-cell" style="width: 15%">To</td>
                <td class="table-cell" style="width: 15%">Departure</td>
                <td class="table-cell" style="width: 55%">Stopage</td>
            </tr>
        </thead>

        <tbody>
            @foreach($transports as $transport)
                <tr>
                    <td class="table-cell" style="width: 15%">{{ $transport->from }}</td>
                    <td class="table-cell" style="width: 15%">{{ $transport->to }}</td>
                    <td class="table-cell" style="width: 15%">{{ $transport->time }}</td>
                    <td class="table-cell" style="width: 55%">{{ $transport->stopage }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>