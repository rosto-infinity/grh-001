<table>
  <thead>
    <tr>
      <th width='40' align='center'>Nom de la Région</th>
      <th width='20' align='center'>Date de Création</th>
      <th width='20' align='center'>Date de Mise à Jour</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($regions as $region)
    <tr> 
        <td width='40'>{{ $region->region_name }}</td>
        <td width='20' align='center'>{{ $region->created_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
        <td width='20' align='center'>{{ $region->updated_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
