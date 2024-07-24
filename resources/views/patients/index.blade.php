@extends('components.layout')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
  <div class="card-datatable table-responsive">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
      <div class="card-header flex-column flex-md-row pb-0">
        <div class="head-label text-center">
          <h5 class="card-title mb-0">DataTable with Buttons</h5>
        </div>
        <div class="dt-action-buttons text-end pt-6 pt-md-0">
          <div class="dt-buttons btn-group flex-wrap"> 
            <div class="btn-group">
              <button class="btn buttons-collection dropdown-toggle btn-label-primary me-4" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
                <span><i class="bx bx-export bx-sm me-sm-2"></i> 
                  <span class="d-none d-sm-inline-block">Export</span>
                </span>
              </button>
            </div> 
            <button class="btn btn-secondary create-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
              <span><i class="bx bx-plus bx-sm me-sm-2"></i> 
                <span class="d-none d-sm-inline-block">Add New Record</span>
              </span>
            </button> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="dataTables_length" id="DataTables_Table_0_length">
            <label>Show 
              <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                <option value="7">7</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="75">75</option>
                <option value="100">100</option>
              </select> entries
            </label>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end mt-n6 mt-md-0">
          <div id="DataTables_Table_0_filter" class="dataTables_filter">
            <label>Search:
              <input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0">
            </label>
          </div>
        </div>
      </div>
      <table class="datatables-basic table border-top dataTable no-footer dtr-column collapsed" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1044px;">
      <thead>
        <tr>
          <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 0px;" aria-label=""></th>
          <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th>
          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 241px;" aria-label="Name: activate to sort column ascending">Name</th>
          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 229px;" aria-label="Email: activate to sort column ascending">Email</th>
          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 75px;" aria-label="Date: activate to sort column ascending">Date</th>
          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 73px;" aria-label="Salary: activate to sort column ascending">Salary</th>
          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 90px;" aria-label="Status: activate to sort column ascending">Status</th>
          <th class="sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Actions">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="odd parent">
          <td class="control" tabindex="0" style=""></td>
          <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
          <td>
            <div class="d-flex justify-content-start align-items-center user-name">
              <div class="avatar-wrapper">
                <div class="avatar me-2">
                  <span class="avatar-initial rounded-circle bg-label-info">GG</span>
                </div>
              </div>
              <div class="d-flex flex-column">
                <span class="emp_name text-truncate">Glyn Giacoppo</span>
                <small class="emp_post text-truncate text-muted">Software Test Engineer</small>
              </div>
            </div>
          </td>
          <td>ggiacoppo2r@apache.org</td>
          <td>04/15/2021</td>
          <td>$24973.48</td>
          <td><span class="badge  bg-label-success">Professional</span></td>
          <td class="dtr-hidden" style="display: none;">
            <div class="d-inline-block">
              <a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow me-1" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a>
              <ul class="dropdown-menu dropdown-menu-end m-0">
                <li><a href="javascript:;" class="dropdown-item">Details</a></li>
                <li><a href="javascript:;" class="dropdown-item">Archive</a></li>
                <div class="dropdown-divider"></div>
                <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
              </ul>
            </div>
            <a href="javascript:;" class="btn btn-icon item-edit"><i class="bx bx-edit bx-md"></i></a>
          </td>
        </tr>
        <tr class="even">
          <td class="control" tabindex="0" style=""></td>
          <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
          <td>
            <div class="d-flex justify-content-start align-items-center user-name">
              <div class="avatar-wrapper">
                <div class="avatar me-2"><img src="../../assets/img/avatars/10.png" alt="Avatar" class="rounded-circle">
                </div>
              </div>
              <div class="d-flex flex-column"><span class="emp_name text-truncate">Evangelina Carnock</span><small class="emp_post text-truncate text-muted">Cost Accountant</small>
              </div>
            </div>
          </td>
          <td>ecarnock2q@washington.edu</td>
          <td>01/26/2021</td>
          <td>$23704.82</td>
          <td><span class="badge  bg-label-warning">Resigned</span></td>
          <td class="dtr-hidden" style="display: none;">
            <div class="d-inline-block"><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow me-1" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a>
              <ul class="dropdown-menu dropdown-menu-end m-0">
                <li><a href="javascript:;" class="dropdown-item">Details</a></li>
                <li><a href="javascript:;" class="dropdown-item">Archive</a></li>
                <div class="dropdown-divider"></div>
                <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
              </ul>
            </div>
            <a href="javascript:;" class="btn btn-icon item-edit"><i class="bx bx-edit bx-md"></i></a>
          </td>
        </tr>
        <tr class="odd">
          <td class="control" tabindex="0" style=""></td>
          <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
          <td>
            <div class="d-flex justify-content-start align-items-center user-name">
              <div class="avatar-wrapper">
                <div class="avatar me-2"><img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                </div>
              </div>
              <div class="d-flex flex-column">
                <span class="emp_name text-truncate">Olivette Gudgin</span>
                <small class="emp_post text-truncate text-muted">Paralegal</small>
              </div>
            </div>
          </td>
          <td>ogudgin2p@gizmodo.com</td>
          <td>04/09/2021</td>
          <td>$15211.60</td>
          <td><span class="badge  bg-label-success">Professional</span></td>
          <td class="dtr-hidden" style="display: none;">
            <div class="d-inline-block"><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow me-1" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a>
              <ul class="dropdown-menu dropdown-menu-end m-0">
                <li><a href="javascript:;" class="dropdown-item">Details</a></li>
                <li><a href="javascript:;" class="dropdown-item">Archive</a></li>
                <div class="dropdown-divider"></div>
                <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
              </ul>
            </div><a href="javascript:;" class="btn btn-icon item-edit"><i class="bx bx-edit bx-md"></i></a>
          </td>
        </tr>
        <tr class="even">
          <td class="control" tabindex="0" style=""></td>
          <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
          <td>
            <div class="d-flex justify-content-start align-items-center user-name">
              <div class="avatar-wrapper">
                <div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-warning">RP</span>
                </div>
              </div>
              <div class="d-flex flex-column"><span class="emp_name text-truncate">Reina Peckett</span><small class="emp_post text-truncate text-muted">Quality Control Specialist</small>
              </div>
            </div>
          </td>
          <td>rpeckett2o@timesonline.co.uk</td><td>05/20/2021</td><td>$16619.40</td><td><span class="badge  bg-label-warning">Resigned</span></td><td class="dtr-hidden" style="display: none;"><div class="d-inline-block"><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow me-1" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><ul class="dropdown-menu dropdown-menu-end m-0"><li><a href="javascript:;" class="dropdown-item">Details</a></li><li><a href="javascript:;" class="dropdown-item">Archive</a></li><div class="dropdown-divider"></div><li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li></ul></div><a href="javascript:;" class="btn btn-icon item-edit"><i class="bx bx-edit bx-md"></i></a></td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-success">AB</span></div></div><div class="d-flex flex-column"><span class="emp_name text-truncate">Alaric Beslier</span><small class="emp_post text-truncate text-muted">Tax Accountant</small></div></div></td><td>abeslier2n@zimbio.com</td><td>04/16/2021</td><td>$19366.53</td><td><span class="badge  bg-label-warning">Resigned</span></td><td class="dtr-hidden" style="display: none;"><div class="d-inline-block"><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow me-1" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><ul class="dropdown-menu dropdown-menu-end m-0"><li><a href="javascript:;" class="dropdown-item">Details</a></li><li><a href="javascript:;" class="dropdown-item">Archive</a></li><div class="dropdown-divider"></div><li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li></ul></div><a href="javascript:;" class="btn btn-icon item-edit"><i class="bx bx-edit bx-md"></i></a></td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><span class="emp_name text-truncate">Edwina Ebsworth</span><small class="emp_post text-truncate text-muted">Human Resources Assistant</small></div></div></td><td>eebsworth2m@sbwire.com</td><td>09/27/2021</td><td>$19586.23</td><td><span class="badge bg-label-primary">Current</span></td><td class="dtr-hidden" style="display: none;"><div class="d-inline-block"><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow me-1" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><ul class="dropdown-menu dropdown-menu-end m-0"><li><a href="javascript:;" class="dropdown-item">Details</a></li><li><a href="javascript:;" class="dropdown-item">Archive</a></li><div class="dropdown-divider"></div><li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li></ul></div><a href="javascript:;" class="btn btn-icon item-edit"><i class="bx bx-edit bx-md"></i></a></td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-warning">RH</span></div></div><div class="d-flex flex-column"><span class="emp_name text-truncate">Ronica Hasted</span><small class="emp_post text-truncate text-muted">Software Consultant</small></div></div></td><td>rhasted2l@hexun.com</td><td>07/04/2021</td><td>$24866.66</td><td><span class="badge  bg-label-warning">Resigned</span></td><td class="dtr-hidden" style="display: none;"><div class="d-inline-block"><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow me-1" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><ul class="dropdown-menu dropdown-menu-end m-0"><li><a href="javascript:;" class="dropdown-item">Details</a></li><li><a href="javascript:;" class="dropdown-item">Archive</a></li><div class="dropdown-divider"></div><li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li></ul></div><a href="javascript:;" class="btn btn-icon item-edit"><i class="bx bx-edit bx-md"></i></a></td></tr></tbody>
    </table><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 7 of 100 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="bx bx-chevron-left bx-18px"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="2" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="3" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="4" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="ellipsis" tabindex="-1" class="page-link">…</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="14" tabindex="0" class="page-link">15</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0" class="page-link"><i class="bx bx-chevron-right bx-18px"></i></a></li></ul></div></div></div><div style="width: 1%;"></div><div style="width: 1%;"></div></div>
  </div>
</div>
  
</div>  
<!-- / Content -->
    
@endsection
