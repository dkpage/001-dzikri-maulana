 <table id="users-table" class="table table-bordered table-striped table-hover" style="width:100%">
     <thead>
         <tr>
             <th class="text-center">No</th>
             <th>Nama Pengguna</th>
             <th>Role</th>
             <th>Tempat Kerja</th>
             <th>Actions</th>
         </tr>
     </thead>
     <tbody id="usersList">
         <?php $i = 1; ?>
         @foreach ($users as $user)
             <tr>
                 <td class="text-center">{{ $i++ }}</td>
                 <td>{{ $user->name }}</td>
                 <td>
                     @if ($user->role == 1)
                         {{ 'Admin' }}
                     @elseif($user->role == 2)
                         {{ 'User' }}
                     @endif
                 </td>
                 <td>Kantor Pusat</td>
                 <td>
                     <a href="javascript:void(0)" class="btn btn-sm btn-primary detailBtn" data-id="{{ $user->usid }}"
                         onclick="showDetail({{ $user->usid }})">
                         <i class="fi fi-rr-user"></i>
                         <span>Edit Detail</span>
                     </a>
                     <a href="javascript:void(0)" class="btn btn-sm btn-danger"
                         onclick="deleteUser({{ $user->usid }}, '{{ $user->name }}')" data-id="{{ $user->usid }}">
                         <i class="fi fi-rr-trash"></i>
                         <span>Hapus</span>
                     </a>
                 </td>
             </tr>
         @endforeach
     </tbody>
 </table>
