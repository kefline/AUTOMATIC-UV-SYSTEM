<div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content slim-scroll3">
      <div class="modal-body p-30 bg-white">
        <div class="d-flex align-items-center justify-content-between pb-30">
          <h4 class="m-0">User Profile
            <small class="text-fade fs-12 ms-5">12 messages</small>
          </h4>
          <a href="#" class="btn btn-icon btn-danger-light btn-sm no-shadow" data-bs-dismiss="modal">
            <span class="fa fa-close"></span>
          </a>
        </div>
        <div>
          <div class="d-flex flex-row">
            <div class=""><img src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/avatar-13.png" alt="user" class="rounded bg-danger-light w-150" width="100"></div>
            <div class="ps-20">
              <h5 class="mb-0">Nil Yeager</h5>
              <p class="my-5 text-fade">Manager</p>
              <a href="mailto:dummy@gmail.com"><span class="icon-Mail-notification me-5 text-success"><span class="path1"></span><span class="path2"></span></span> dummy@gmail.com</a>
              <button class="btn btn-success-light btn-sm mt-5"><i class="ti-plus"></i> Follow</button>
            </div>
          </div>
        </div>
        <div class="dropdown-divider my-30"></div>
        <div>
          <div class="d-flex align-items-center mb-30">
            <div class="me-15 bg-primary-light h-50 w-50 l-h-60 rounded text-center">
              <span class="icon-Library fs-24"><span class="path1"></span><span class="path2"></span></span>
            </div>
            <div class="d-flex flex-column fw-500">
              <a href="extra_profile.html" class="text-dark hover-primary mb-1 fs-16">My Profile</a>
              <span class="text-fade">Account settings and more</span>
            </div>
          </div>
          <div class="d-flex align-items-center mb-30">
            <div class="me-15 bg-danger-light h-50 w-50 l-h-60 rounded text-center">
              <span class="icon-Write fs-24"><span class="path1"></span><span class="path2"></span></span>
            </div>
            <div class="d-flex flex-column fw-500">
              <a href="mailbox.html" class="text-dark hover-danger mb-1 fs-16">My Messages</a>
              <span class="text-fade">Inbox and tasks</span>
            </div>
          </div>
          <div class="d-flex align-items-center mb-30">
            <div class="me-15 bg-success-light h-50 w-50 l-h-60 rounded text-center">
              <span class="icon-Group-chat fs-24"><span class="path1"></span><span class="path2"></span></span>
            </div>
            <div class="d-flex flex-column fw-500">
              <a href="setting.html" class="text-dark hover-success mb-1 fs-16">Settings</a>
              <span class="text-fade">Account Settings</span>
            </div>
          </div>
          <div class="d-flex align-items-center mb-30">
            <div class="me-15 bg-info-light h-50 w-50 l-h-60 rounded text-center">
              <span class="icon-Attachment1 fs-24"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
            </div>
            <div class="d-flex flex-column fw-500">
              <a href="extra_taskboard.html" class="text-dark hover-info mb-1 fs-16">Project</a>
              <span class="text-fade">latest tasks and projects</span>
            </div>
          </div>
          <div class="d-flex align-items-center mb-30">
            <div class="me-15 bg-info-light h-50 w-50 l-h-60 rounded text-center">
              <span class="icon-Attachment1 fs-24"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
            </div>
            <div class="d-flex flex-column fw-500">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-dark hover-info mb-1 fs-16 btn btn-link">Logout</button>
              </form>
            </div>
          </div>
        </div>
        <div class="dropdown-divider my-30"></div>
      </div>
    </div>
  </div>
</div> 