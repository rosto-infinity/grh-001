<table>
  <thead>
  <tr>
    <th>Job title</th>
    <th>Min Salary</th>
    <th>Max Salary</th>

    <th>Date de création</th>
  </tr>
  </thead>
  <tbody>

    @foreach ($emplois as $emploi)
    <tr> 
        <td>{{ $emploi->emploi_title }}</td>
        <td>{{ $emploi->min_salary }}</td>
        <td>{{ $emploi->max_salary }}</td>
        <td>{{ $emploi->created_at}}</td>
    </tr>
    @endforeach

  </tbody>
</table>