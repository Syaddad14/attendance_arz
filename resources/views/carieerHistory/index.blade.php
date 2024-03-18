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
                <form action="{{ route('carieerHistory.store') }}" method="POST">
                    @csrf

                    <label for="employee_id">Employee:</label>
                    <select name="employee_id" id="employee_id">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select><br>

                    <label for="position_id">Position:</label>
                    <select name="position_id" id="position_id">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->job_position }}</option>
                        @endforeach
                    </select><br>

                    <label for="department_id">Department:</label>
                    <select name="department_id" id="department_id">
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select><br>

                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date"><br>

                    <button type="submit">Submit</button>
                </form>

            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($careerHistories as $careerHistory)
                    <tr>
                        <td>{{ $careerHistory->employee->name }}</td>
                        <td>{{ $careerHistory->position->job_position }}</td>
                        <td>{{ $careerHistory->department->name }}</td>
                        <td>{{ $careerHistory->date }}</td>
                        <td><a href="{{ route('carieerHistory.edit', $careerHistory->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Tombol Delete -->
                        <form action="{{ route('carieerHistory.destroy', $careerHistory->id) }}" method="POST" style="display: inline-block;">
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
