<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
     <table>
          <thead>
               <th>test</th>
          </thead>
          <tbody>
               @php $no=1; @endphp
                    @foreach($bebas as $bebass)
                         <tr>
                              <td>{{$bebass->created_at}}</td>
                         </tr>
                    @endforeach
          </tbody>
     </table>
</body>
</html>