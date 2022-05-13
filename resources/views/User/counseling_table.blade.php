<style>
    .table-container{
        width: 100%;
        height: 60%;
        padding: 20px;
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
                <td class="table-cell" style="width: 20%">Date</td>
                <td class="table-cell" style="width: 20%">Time</td>
                <td class="table-cell" style="width: 20%">Duration</td>
                <td class="table-cell" style="width: 40%">Student</td>
            </tr>
        </thead>

        <tbody>
            @foreach($counselings as $counseling)
                <tr>
                    <td class="table-cell" style="width: 20%">{{ $counseling->date }}</td>
                    <td class="table-cell" style="width: 20%">{{ $counseling->time }}</td>
                    <td class="table-cell" style="width: 20%">{{ $counseling->duartion }}</td>
                    
                    @if($counseling->student_id)
                        <td class="table-cell" style="width: 40%">Taken</td>
                    @endif
                    @if(!$counseling->student_id)
                        <td class="table-cell" style="width: 40%">
                            <div><a href="counseling/take/{{$counseling->id}}" class="button">Take</a></div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>