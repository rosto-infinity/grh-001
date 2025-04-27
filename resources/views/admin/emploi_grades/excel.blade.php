<table>
  <thead>
    <tr>
      <th width='40' align='center'>Niveau de Grade</th>
      <th width='20' align='center'>Salaire Minimum</th>
      <th width='20' align='center'>Salaire Maximum</th>
      <th width='20' align='center'>Date de Création</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($emploi_grades as $emploi_grade)
    <tr> 
        <td width='40'>{{ $emploi_grade->grade_level }}</td>
        <td width='20' align='center'>{{ $emploi_grade->lowest_salary }}</td>
        <td width='20' align='center'>{{ $emploi_grade->highest_salary }}</td>
        <td width='20' align='center'>{{ $emploi_grade->created_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
