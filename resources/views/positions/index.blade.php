<x-app-layout>
    <div class="container">
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Employee
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action={{route('positions.store')}} method="POST">
                @method('post')
                @csrf
                <div class="form-group">
                    <label for="Job Position">Name:</label>
                    <input type="text" class="form-control" id="job_position" name="job_position">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
          </div>
        </div>
      </div>
        
      <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Job Position</th>            
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($positions as $position)
                    <tr>
                        <td>{{ $position->job_position }}</td>
                        <td><a href="{{ route('positions.edit', $position->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Tombol Delete -->
                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-1" onclick="return confirm('Are you sure you want to delete this employee?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
        </div>
    </x-app-layout>