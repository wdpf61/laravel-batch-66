
 <h1>Student Id=> [[$id]]</h1>
 <h1>Student name=> [[$name]]</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>
     @foreach($student as $key=>$student)

    <tr>
        <th>[[$key]]</th>
        <th>[[$student]]</th>
     </tr>
     @endforeach
</table>



