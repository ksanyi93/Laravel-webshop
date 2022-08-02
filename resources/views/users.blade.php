<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<table border=1 cellpadding=5>

    <tr>
        <th>
            Név
        </th>

        <th>
            Email
        </th>

        <th>
            Regisztráció dátuma
        </th>

        <th>
            Utca,házszám
        </th>
    </tr>

    <tr>
        <td>
            {{$user->name}}
        </td>

        <td>
            {{$user->email}}
        </td>

        <td>
            {{$user->created_at}}
        </td>
        

        <td></td>
    </tr>


@foreach($user->addresses as $a)

<tr>
    <td colspan=3>
        {{$a->city}}
    </td>

    <td>
        {{$a->street}}
    </td>
</tr>


@endforeach



{{-- @foreach ($user->favourites as $f)
    <tr>
        <td colspan=3>
            {{$f->title}}
        </td> --}}

{{--          <td>
            {{$u->email}}
        </td>

        <td>
            {{$u->created_at}}
        </td>
    </tr>
@endforeach --}}
</table>



</body>
</html>