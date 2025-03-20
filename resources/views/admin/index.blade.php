@extends('admin.layouts.master')
@section('content')
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Thống kê doanh thu</h4>
                                <h5 class="card-subtitle">Doanh thu về 12 tháng gần nhất</h5>
                            </div>
                        </div>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <!-- <div class="flot-chart-content" id="flot-line-chart"></div> -->
                                    <canvas id="revenueChart"></canvas>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">{{$patientCount}}</h5>
                                            <small class="font-light">Tổng số bệnh nhân</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">{{$doctorCount}}</h5>
                                            <small class="font-light">Tổng số bác sĩ</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-tag fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">{{$totalBill->month}}</h5>
                                            <small class="font-light">Tổng số hoá đơn trong tháng</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bài viết mới nhất</h4>
                    </div>
                    <div class="comment-widgets scrollable">
                        <!-- Comment Row -->
                        @foreach($posts as $post)
                        <div class="d-flex flex-row comment-row mt-0">
                            <div class="p-2">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="user" width="50"
                                    class="rounded-circle" />
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">{{$post->title}}</h6>
                                <div class="comment-footer">
                                    <span class="text-muted float-end">{{$post->updated_at->format('d/m/Y')}}</span>
                                    <a href="{{ URL::to('/posts/edit-post/'. $post->id) }}">
                                        <button type="button" class="btn btn-cyan btn-sm text-white">
                                            Edit
                                        </button>
                                    </a>
                                    <button data-id="{{$post->id}}" onclick="changeStatus(this)" type="button"
                                        class="btn btn-success btn-sm text-white">
                                        {{$post->status == 1 ? 'Published' : 'Publish'}}
                                    </button>
                                    <a href="#" data-id="{{$post->id}}" onclick="deletePost(this)">
                                        <button type="button" class="btn btn-danger btn-sm text-white">
                                            Delete
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Card -->
            </div>
            <!-- column -->
            <div class="col-lg-6">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" id="currentDoctorId" value="{{ auth()->id() }}">
                        <h4 class="card-title">Chat Option</h4>
                    </div>
                    <div class="chat-container" id="chatBox">
                        <ul class="chat-list" id="messageList">
                            <!-- Tin nhắn sẽ được thêm vào đây -->
                        </ul>
                    </div>


                    <div class="card-body border-top">
                        <div class="row">
                            <div class="col-9">
                                <div class="input-field mt-0 mb-0">
                                    <textarea id="messageInput" placeholder="Type and enter"
                                        class="form-control border-0"></textarea>
                                </div>
                            </div>
                            <div class="col-3">
                                <a id="sendMessageBtn" class="btn-circle btn-lg btn-cyan float-end text-white"
                                    href="javascript:void(0)"><i class="mdi mdi-send fs-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

    document.addEventListener("DOMContentLoaded", function() {
        console.log("⚡ Đang kết nối Laravel Echo...");

        if (typeof window.Echo === "undefined") {
            console.error("❌ Laravel Echo chưa được khởi tạo!");
            return;
        }

        window.Echo.join('group-chat')
            .here(users => console.log("📢 Danh sách user trong group-chat:", users))
            .joining(user => console.log("✅ Một user vừa tham gia:", user))
            .leaving(user => console.log("❌ Một user vừa rời khỏi:", user))
            .error(error => console.error("❌ Lỗi khi tham gia kênh:", error))
            .listen(".message.sent", (e) => {
                console.log("📢 Tin nhắn nhận được từ server:", e);
               addMessageToChat(e, e.user.id);
            });
    });
    const doctorId = document.getElementById("currentDoctorId").value;
    function addMessageToChat(message, isSender) {
        const chatList = document.querySelector(".chat-list");
        const li = document.createElement("li");
        li.classList.add("chat-item");
        const contentDiv = document.createElement("div");
        contentDiv.classList.add("chat-content");
        //console.log(message);
        if (isSender == doctorId) {
            li.classList.add("odd");
        } else {
            const imgDiv = document.createElement("div");
            imgDiv.classList.add("chat-img");
            const imageUrl = `/storage/${message.user.doctor.image}`; // Đúng cú pháp
            imgDiv.innerHTML = `<img src="${imageUrl}" alt="user" />`;
            li.appendChild(imgDiv);

            const nameTag = document.createElement("h6");
            nameTag.classList.add("font-medium");
            nameTag.innerText = message.user && message.user.lastName ? message.user.lastName : "Unknown Doctor";
            contentDiv.appendChild(nameTag);
        }



        const messageBox = document.createElement("div");
        messageBox.classList.add("box", isSender ? "bg-light-inverse" : "bg-light-info");
        messageBox.innerText = message.message;

        contentDiv.appendChild(messageBox);
        li.appendChild(contentDiv);
        chatList.appendChild(li);
    }

    //Lấy tất cả tin nhắn khi cũ khi load trang

    document.addEventListener("DOMContentLoaded", function() {
        loadMessages();

        document.getElementById("messageInput").addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Tránh xuống dòng trong textarea
            sendMessage();
        }
        });

        document.getElementById("sendMessageBtn").addEventListener("click", () => {
            let message = document.getElementById("messageInput").value;

            if (message.trim() === "") {
                return;
            }

            fetch("/send-message", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: "Bearer " + localStorage.getItem("token"),
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        message: message
                    }),
                })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data.success) {
                        document.getElementById("messageInput").value = "";
                    } else {
                        console.error("Server Error: ", data.message);
                    }
                })
                .catch((error) => console.error("Error:", error));

        });
    })

    
    
    function loadMessages() {
        fetch("/get-messages")
            .then(response => response.json())
            .then(messages => {
                const chatBox = document.getElementById("chatBox");
                const messageList = document.getElementById("messageList");
                messageList.innerHTML = ""; // Xóa tin nhắn cũ trước khi nạp mới
                messages.forEach(message => {
                    addMessageToChat(message, message.doctorId);
                });
                chatBox.scrollTop = chatBox.scrollHeight;
            })
            .catch(error => console.error("Error loading messages: ", error));
    }
    </script>



















    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy dữ liệu từ Laravel (nhúng vào Blade)
        let months = @json($months);
        let totals = @json($totals);

        // Kiểm tra dữ liệu trước khi vẽ biểu đồ
        if (!months || !totals || months.length === 0 || totals.length === 0) {
            console.error("Không có dữ liệu để vẽ biểu đồ");
            return;
        }

        // Vẽ biểu đồ với Chart.js
        const ctx = document.getElementById("revenueChart").getContext("2d");
        new Chart(ctx, {
            type: "line",
            data: {
                labels: months, // Trục X (tháng)
                datasets: [{
                    label: "Doanh thu theo tháng",
                    data: totals, // Dữ liệu doanh thu
                    borderColor: "rgba(75, 192, 192, 1)", // Màu đường kẻ
                    backgroundColor: "rgba(75, 192, 192, 0.2)", // Màu nền
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4, // Làm mượt đường
                    pointRadius: 5, // Kích thước điểm
                    pointBackgroundColor: "rgba(75, 192, 192, 1)", // Màu điểm
                    hoverBorderWidth: 3, // Độ dày khi hover
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Giữ kích thước động
                plugins: {
                    legend: {
                        display: true,
                        position: "top"
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: "rgba(200, 200, 200, 0.3)"
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
    </script>



    <script>
    function changeStatus(element) {
        let id = element.getAttribute('data-id');
        $.ajax({
            url: '/posts/change-status/' + id,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                alert('Error Change Status On Post');
            }
        });
    }

    function deletePost(element) {
        let id = element.getAttribute('data-id'); // Lấy giá trị từ thuộc tính data-id;
        if (confirm('Are you sure you want to delete this post?')) {
            $.ajax({
                url: '/posts/delete-post/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Nếu muốn xóa ngay khỏi giao diện mà không reload:
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Error deleting Post');
                }
            });
        } else {
            // If user cancels the action
            alert('Delete action has been canceled.');
        }
    }
    </script>
    @endsection