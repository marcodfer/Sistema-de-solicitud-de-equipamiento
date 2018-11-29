<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
  </head>
  <body>
 
    <h1>Customer List</h1>
<a href="{{ URL::to('/customers/pdf') }}">Export PDF</a>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $customer)
      <tr>
        <td>{{ $customer->sol_codigo }}</td>
        <td>{{ $customer->sol_titulo }}</td>
        <td>{{ $customer->usu_rut }}</td>
        <td>{{ $customer->sol_fecha_entrega }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
  </body>
</html>