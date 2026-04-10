<x-layout title="Student List">
<style>
    .table{
        display: flex;
        justify-content: center;
        background-color: #f2f2f2;
        padding: 20px;
        color: #333;
        cursor: pointer;
    }
    table {

        border-collapse: collapse;
        width: 80%;
        background-color: #fff;
        color: #333;
          
    }
    tr{
        border-bottom: 1px solid #ddd;

    }
</style>
<div>

    
   
    <div class="table">
   <table border="1">
    <thead>
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>dob</th>
        <th>action</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $infoo)
        <tr>
            <td>{{ $infoo->last_name }}</td>
            <td>{{ $infoo->first_name }}</td>
            <td>{{ $infoo->dob }}</td>
            <td>
                <a href="/students/{{ $infoo->id }}">Edit</a>
                <form action="/students/{{ $infoo->id }}" method="post" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" style="background:red; color:white; border:none; padding:5px 10px; cursor:pointer;">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
   </table> 
   </div>
   <br><br><br>


</div>
</x-layout>