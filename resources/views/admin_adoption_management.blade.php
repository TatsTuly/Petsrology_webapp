
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Adoption Management | PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            margin: 0;
            min-height: 100vh;
        }
        .admin-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 24px 0 18px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .header-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .admin-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .admin-logo {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }
        .brand-text h1 {
            font-size: 1.7rem;
            font-weight: 800;
            margin-bottom: 2px;
            background: linear-gradient(45deg, #fff, #ecf0f1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .admin-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .logout-btn {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
        }
        .logout-btn:hover {
            background: linear-gradient(135deg, #c0392b 0%, #a93226 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }
        .admin-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .admin-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 18px;
            color: #2c3e50;
        }
        .admin-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }
        .admin-tab-btn {
            background: #fff;
            border: 1px solid #3498db;
            color: #3498db;
            padding: 10px 28px;
            border-radius: 20px 20px 0 0;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.2s;
            outline: none;
        }
        .admin-tab-btn.active, .admin-tab-btn:hover {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: #fff;
            border-bottom: 2px solid #fff;
        }
        .admin-tab-content {
            background: #fff;
            border-radius: 0 0 18px 18px;
            box-shadow: 0 4px 18px rgba(52, 152, 219, 0.08);
            padding: 32px 28px 24px 28px;
            min-height: 320px;
        }
        .form-group {
            margin-bottom: 18px;
        }
        .form-label {
            font-weight: 700;
            color: #34495e;
            margin-bottom: 6px;
            display: block;
        }
        .form-control, .form-select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #bfc9d1;
            border-radius: 8px;
            font-size: 1rem;
            margin-bottom: 2px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: #fff;
            border: none;
            padding: 12px 32px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #2980b9 0%, #3498db 100%);
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="header-container">
            <div class="admin-brand">
                <div class="admin-logo">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="brand-text">
                    <h1>Admin Panel</h1>
                </div>
            </div>
            <div class="admin-nav">
                <a href="{{ url('/admin/adoption-management') }}" class="btn btn-light" style="color:#fff;font-weight:700;">Adoption Management</a>
                <a href="{{ url('/admin/dashboard') }}" class="btn btn-light" style="color:#fff;font-weight:700;">Dashboard</a>
                <a href="#" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>
    <div class="admin-container">
        <div class="admin-title">Adoption Management</div>
        @if(session('success'))
        <div style="background:linear-gradient(135deg,#d4fc79 0%,#96e6a1 100%);color:#155724;padding:18px 24px;border-radius:12px;margin-bottom:22px;font-weight:700;box-shadow:0 2px 10px rgba(76,175,80,0.08);display:flex;align-items:center;gap:12px;">
            <i class="fas fa-check-circle" style="font-size:1.5rem;"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        @if(session('error'))
        <div style="background:linear-gradient(135deg,#f85032 0%,#e73827 100%);color:#fff;padding:18px 24px;border-radius:12px;margin-bottom:22px;font-weight:700;box-shadow:0 2px 10px rgba(231,56,39,0.08);display:flex;align-items:center;gap:12px;">
            <i class="fas fa-exclamation-triangle" style="font-size:1.5rem;"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif
        @if($errors->any())
        <div style="background:linear-gradient(135deg,#f85032 0%,#e73827 100%);color:#fff;padding:18px 24px;border-radius:12px;margin-bottom:22px;font-weight:700;box-shadow:0 2px 10px rgba(231,56,39,0.08);display:flex;align-items:center;gap:12px;">
            <i class="fas fa-exclamation-triangle" style="font-size:1.5rem;"></i>
            <span>
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </span>
        </div>
        @endif
        <div class="admin-tabs">
            <button class="admin-tab-btn active" onclick="showTab('create')" id="tab-create">Create Post</button>
            <button class="admin-tab-btn" onclick="showTab('update')" id="tab-update">Update Post</button>
            <button class="admin-tab-btn" onclick="showTab('delete')" id="tab-delete">Delete Post</button>
            <button class="admin-tab-btn" onclick="showTab('request')" id="tab-request">Adoption Requests</button>
            <button class="admin-tab-btn" onclick="showTab('showall')" id="tab-showall">Show All Pets</button>
        </div>
        <div class="admin-tab-content" id="tab-content-create">
            <form action="{{ route('admin.adoption.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Removed Adoption Number field -->
                <div class="form-group">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Bird">Bird</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="breed" class="form-label">Breed</label>
                    <input type="text" class="form-control" id="breed" name="breed">
                </div>
                <div class="form-group">
                    <label for="weight" class="form-label">Weight</label>
                    <input type="text" class="form-control" id="weight" name="weight">
                </div>
                <div class="form-group">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location">
                </div>
                <div class="form-group">
                    <label for="tags" class="form-label">Tags <span style="font-weight:400; color:#888;">(comma separated)</span></label>
                    <input type="text" class="form-control" id="tags" name="tags">
                </div>
                <div class="form-group">
                    <label for="health_info" class="form-label">Health Info <span style="font-weight:400; color:#888;">(separate items with | )</span></label>
                    <input type="text" class="form-control" id="health_info" name="health_info">
                </div>
                <div class="form-group">
                    <label for="special_care" class="form-label">Special Care Notes</label>
                    <textarea class="form-control" id="special_care" name="special_care" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="fee" class="form-label">Adoption Fee</label>
                    <input type="text" class="form-control" id="fee" name="fee">
                </div>
                <div class="form-group">
                    <label for="fee_includes" class="form-label">Fee Includes</label>
                    <input type="text" class="form-control" id="fee_includes" name="fee_includes">
                </div>
                <div class="form-group">
                    <label for="pet_name" class="form-label">Pet Name</label>
                    <input type="text" class="form-control" id="pet_name" name="pet_name" required>
                </div>
                <div class="form-group">
                    <label for="pet_age" class="form-label">Pet Age</label>
                    <input type="number" class="form-control" id="pet_age" name="pet_age" required>
                </div>
                <div class="form-group">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="character" class="form-label">Character</label>
                    <input type="text" class="form-control" id="character" name="character" required>
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn-primary">Create Post</button>
            </form>
        </div>
        <div class="admin-tab-content" id="tab-content-update" style="display:none;">
            <form method="GET" action="" id="searchUpdateForm" style="margin-bottom:18px;display:flex;gap:12px;align-items:center;">
                <input type="text" class="form-control" name="update_adoption_id" id="update_adoption_id" placeholder="Enter Adoption Post ID" required style="max-width:220px;">
                <button type="button" class="btn-primary" onclick="searchAdoptionPostById('update')">Search</button>
            </form>
            <div id="updateFormContainer"></div>
        </div>
        <div class="admin-tab-content" id="tab-content-delete" style="display:none;">
            <form method="GET" action="" id="searchDeleteForm" style="margin-bottom:18px;display:flex;gap:12px;align-items:center;">
                <input type="text" class="form-control" name="delete_adoption_id" id="delete_adoption_id" placeholder="Enter Adoption Post ID" required style="max-width:220px;">
                <button type="button" class="btn-primary" style="background:linear-gradient(135deg,#e74c3c 0%,#c0392b 100%);" onclick="searchAdoptionPostById('delete')">Search</button>
            </form>
            <div id="deleteFormContainer"></div>
        </div>
        <div class="admin-tab-content" id="tab-content-request" style="display:none;">
            <h2 style="margin-bottom:18px;">Adoption Requests</h2>
            <style>
                .adoption-requests-table {
                    width: 100%;
                    border-collapse: separate;
                    border-spacing: 0;
                    background: #fff;
                    box-shadow: 0 2px 12px rgba(44,62,80,0.07);
                    border-radius: 12px;
                    overflow: hidden;
                }
                .adoption-requests-table th, .adoption-requests-table td {
                    padding: 14px 18px;
                    border-bottom: 1px solid #f0f0f0;
                    text-align: left;
                }
                .adoption-requests-table th {
                    background: #f8fafc;
                    font-size: 1.05rem;
                    font-weight: 700;
                    color: #34495e;
                    border-top: 1px solid #f0f0f0;
                }
                .adoption-requests-table tr:last-child td {
                    border-bottom: none;
                }
                .status-badge {
                    display: inline-block;
                    padding: 4px 14px;
                    border-radius: 16px;
                    font-size: 0.95rem;
                    font-weight: 600;
                }
                .status-pending { background: #fff3cd; color: #856404; }
                .status-confirmed { background: #d4edda; color: #155724; }
                .status-cancelled { background: #f8d7da; color: #721c24; }
                .action-btn {
                    border: none;
                    border-radius: 18px;
                    padding: 7px 18px;
                    font-size: 0.97rem;
                    font-weight: 600;
                    margin-right: 6px;
                    cursor: pointer;
                    transition: background 0.2s;
                }
                .action-confirm { background: linear-gradient(90deg,#27ae60,#2ecc71); color: #fff; }
                .action-cancel { background: linear-gradient(90deg,#e74c3c,#c0392b); color: #fff; }
                .action-btn:disabled { background: #eee; color: #aaa; cursor: not-allowed; }
            </style>
            <div style="overflow-x:auto;">
            <table class="adoption-requests-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pet</th>
                        <th>User Email</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php $requests = \App\Models\AdoptionRequest::with('adoptionPost')->orderBy('created_at','desc')->get(); @endphp
                @forelse($requests as $req)
                    <tr>
                        <td>{{ $req->id }}</td>
                        <td>{{ optional($req->adoptionPost)->pet_name ?? '-' }}</td>
                        <td>{{ $req->email }}</td>
                        <td>{{ $req->firstName }} {{ $req->lastName }}</td>
                        <td>{{ $req->phone }}</td>
                        <td>
                            @if($req->status == 0)
                                <span class="status-badge status-pending">Pending</span>
                            @elseif($req->status == 1)
                                <span class="status-badge status-confirmed">Confirmed</span>
                            @else
                                <span class="status-badge status-cancelled">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            @if($req->status == 0)
                                <form method="POST" action="{{ url('/admin/adoption-request/'.$req->id.'/confirm') }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="action-btn action-confirm">Confirm</button>
                                </form>
                                <form method="POST" action="{{ url('/admin/adoption-request/'.$req->id.'/cancel') }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="action-btn action-cancel">Cancel</button>
                                </form>
                            @elseif($req->status == 1)
                                <button class="action-btn action-confirm" disabled>Confirmed</button>
                                <form method="POST" action="{{ url('/admin/adoption-request/'.$req->id.'/cancel') }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="action-btn action-cancel">Cancel</button>
                                </form>
                            @else
                                <button class="action-btn action-cancel" disabled>Cancelled</button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" style="text-align:center;padding:16px;">No adoption requests found.</td></tr>
                @endforelse
                </tbody>
            </table>
            </div>
        </div>
        <div class="admin-tab-content" id="tab-content-showall" style="display:none;">
            <h2 style="margin-bottom:18px;">All Pets</h2>
            <div style="overflow-x:auto;">
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#f5f7fa;">
                        <th style="padding:8px 12px;border:1px solid #ddd;">ID</th>
                        <th style="padding:8px 12px;border:1px solid #ddd;">Name</th>
                        <th style="padding:8px 12px;border:1px solid #ddd;">Age</th>
                        <th style="padding:8px 12px;border:1px solid #ddd;">Location</th>
                        <th style="padding:8px 12px;border:1px solid #ddd;">Gender</th>
                        <th style="padding:8px 12px;border:1px solid #ddd;">Category</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($adoptionPosts as $post)
                    <tr>
                        <td style="padding:8px 12px;border:1px solid #ddd;">{{ $post->id }}</td>
                        <td style="padding:8px 12px;border:1px solid #ddd;">{{ $post->pet_name }}</td>
                        <td style="padding:8px 12px;border:1px solid #ddd;">{{ $post->pet_age }}</td>
                        <td style="padding:8px 12px;border:1px solid #ddd;">{{ $post->location }}</td>
                        <td style="padding:8px 12px;border:1px solid #ddd;">{{ $post->gender }}</td>
                        <td style="padding:8px 12px;border:1px solid #ddd;">{{ $post->category }}</td>
                <td style="padding:8px 12px;border:1px solid #ddd;">
                    @if($post->status === 'adopted')
                        <span class="status-badge status-confirmed">Adopted</span>
                    @elseif($post->status === 'active')
                        <span class="status-badge status-pending">Available</span>
                    @else
                        <span class="status-badge">{{ ucfirst($post->status) }}</span>
                    @endif
                </td>
                    </tr>
                @empty
                    <tr><td colspan="6" style="text-align:center;padding:16px;">No pets found.</td></tr>
                @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <script>
        // AJAX search and form rendering for update/delete by ID
        function searchAdoptionPostById(type) {
            const adoptionId = document.getElementById(type + '_adoption_id').value;
            if (!adoptionId) return;
            fetch(`/admin/adoption-management/search-by-id/${adoptionId}`)
                .then(res => res.json())
                .then(data => {
                    if (data && data.id) {
                        if (type === 'update') renderUpdateForm(data);
                        else renderDeleteForm(data);
                    } else {
                        document.getElementById(type + 'FormContainer').innerHTML = `<div style='color:#e74c3c;font-weight:700;'>No adoption post found for this ID.</div>`;
                    }
                })
                .catch(() => {
                    document.getElementById(type + 'FormContainer').innerHTML = `<div style='color:#e74c3c;font-weight:700;'>Error searching for adoption post.</div>`;
                });
        }

        function renderUpdateForm(post) {
            document.getElementById('updateFormContainer').innerHTML = `
                <form action="/admin/adoption-management/update/${post.id}" method="POST" enctype="multipart/form-data" style="margin-top:10px;">
                    <input type='hidden' name='_token' value='${document.querySelector('input[name=_token]').value}'>
                    <div class='form-group'><label class='form-label'>Title</label><input type='text' class='form-control' name='title' value='${post.title}' required></div>
                    <div class='form-group'><label class='form-label'>Pet Name</label><input type='text' class='form-control' name='pet_name' value='${post.pet_name}' required></div>
                    <div class='form-group'><label class='form-label'>Pet Age</label><input type='number' class='form-control' name='pet_age' value='${post.pet_age}' required></div>
                    <div class='form-group'><label class='form-label'>Gender</label><select class='form-select' name='gender' required><option value='Male' ${post.gender==='Male'?'selected':''}>Male</option><option value='Female' ${post.gender==='Female'?'selected':''}>Female</option></select></div>
                    <div class='form-group'><label class='form-label'>Character</label><input type='text' class='form-control' name='character' value='${post.character}' required></div>
                    <div class='form-group'><label class='form-label'>Description</label><textarea class='form-control' name='description' rows='3' required>${post.description}</textarea></div>
                    <div class='form-group'><label class='form-label'>Image</label><input type='file' class='form-control' name='image'></div>
                    <button type='submit' class='btn-primary'>Update Post</button>
                </form>
            `;
        }

        function renderDeleteForm(post) {
            document.getElementById('deleteFormContainer').innerHTML = `
                <div style='margin-bottom:12px;font-weight:700;'>Are you sure you want to delete this post?</div>
                <form action="/admin/adoption-management/delete/${post.id}" method="POST" style="margin-top:10px;">
                    <input type='hidden' name='_token' value='${document.querySelector('input[name=_token]').value}'>
                    <div class='form-group'><label class='form-label'>Post ID</label><input type='text' class='form-control' value='${post.id}' readonly></div>
                    <div class='form-group'><label class='form-label'>Pet Name</label><input type='text' class='form-control' value='${post.pet_name}' readonly></div>
                    <button type='submit' class='btn-primary' style='background:linear-gradient(135deg,#e74c3c 0%,#c0392b 100%);'>Delete Post</button>
                </form>
            `;
        }
        function showTab(tab) {
            const tabs = ['create', 'update', 'delete', 'request', 'showall'];
            tabs.forEach(function(t) {
                document.getElementById('tab-content-' + t).style.display = (t === tab) ? '' : 'none';
                document.getElementById('tab-' + t).classList.toggle('active', t === tab);
            });
        }
    </script>
</body>
</html>
