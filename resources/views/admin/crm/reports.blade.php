@extends('layouts.app')
@section('section')
@push('styles')
    <link href="{{asset('vendors/choices/choices.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet">
@endpush

       <nav class="mb-2" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
            <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
            <li class="breadcrumb-item active">Default</li>
          </ol>
        </nav>
        <div class="pb-8">
          <h2 class="mb-4">Reports</h2>
          <div id="reports" data-list='{"valueNames":["title","text","priority","reportsby","reports","date"],"page":10,"pagination":true}'>
            <div class="row g-3 justify-content-between mb-2">
              <div class="col-12">
                <div class="d-md-flex justify-content-between">
                  <div class="mb-3">
                    <button class="btn btn-primary me-4"><span class="fas fa-plus me-2"></span>Create Report</button>
                    <button class="btn btn-link text-900 px-0"><span class="fa-solid fa-file-export fs--1 me-2"></span>Export </button>
                  </div>
                  <div class="d-flex mb-3">
                    <div class="search-box me-2">
                      <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search" placeholder="Search by name" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>

                      </form>
                    </div>
                    <button class="btn px-3 btn-phoenix-secondary" type="button" data-bs-toggle="modal" data-bs-target="#reportsFilterModal" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-filter text-primary" data-fa-transform="down-3"></span></button>
                    <div class="modal fade" id="reportsFilterModal" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border">
                          <form id="addEventForm" autocomplete="off">
                            <div class="modal-header border-200 p-4">
                              <h5 class="modal-title text-1000 fs-2 lh-sm">Filter</h5>
                              <button class="btn p-1 text-danger" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"> 				</span></button>
                            </div>
                            <div class="modal-body pt-4 pb-2 px-4">
                              <div class="mb-3">
                                <label class="fw-bold mb-2 text-1000" for="priority">Priority</label>
                                <select class="form-select" id="priority">
                                  <option value="urgent" selected="selected">Urgent</option>
                                  <option value="medium">Medium </option>
                                  <option value="high">High</option>
                                  <option value="low">Low</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label class="fw-bold mb-2 text-1000" for="createDate">Create Date</label>
                                <select class="form-select" id="createDate">
                                  <option value="today" selected="selected">Today</option>
                                  <option value="last7Days">Last 7 Days</option>
                                  <option value="last30Days">Last 30 Days</option>
                                  <option value="chooseATimePeriod">Choose a time period</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label class="fw-bold mb-2 text-1000" for="category">Category</label>
                                <select class="form-select" id="category">
                                  <option value="salesReports" selected="selected">Sales Reports</option>
                                  <option value="hrReports">HR Reports</option>
                                  <option value="marketingReports">Marketing Reports</option>
                                  <option value="administrativeReports">Administrative Reports</option>
                                </select>
                              </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 border-0 pt-3">
                              <button class="btn btn-sm btn-phoenix-primary px-4 fs--2 my-0" type="submit"> <span class="fas fa-arrows-rotate me-2 fs--2"></span>Reset</button>
                              <button class="btn btn-sm btn-primary px-9 fs--2 my-0" type="submit">Done</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row g-3 list" id="reportsList">
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Purchasers and sellers</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-danger" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Urgent</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Purchasing-Related Vendors</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports by email</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Sales Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 30, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Useful Solutions</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-danger" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Urgent</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Obtaining leads today</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports by email</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">HR Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 20, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Category Products</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-success" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Medium</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Based on the percentage of recipients</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports on Sales Orders</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Marketing Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 28, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Current Deals</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-success" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Medium</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Sales for Today</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reviews of Products</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Sales Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 28, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Useful Solutions</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-info" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Low</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Obtaining leads today</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports by email</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Hr Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 27, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Current Deals</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-info" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Low</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Sums up the many existing businesses.</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports by email</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Service Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 26, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Lost of Deals</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-warning" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">High</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Emails sent by users to all records,</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports on Deals</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Sales Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 25, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Important Accounts</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-info" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Low</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Contracts closed by a salesman</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports on Deals</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Marketing Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 25, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Analytics for Email</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-success" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Medium</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Based on Status Sales Orders</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reviews of Products</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Sales Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 24, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Types of Deals</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-success" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Medium</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Products support will stop this month</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports by email</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Marketing Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 23, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Category Products</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-warning" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">High</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Based on the percentage of recipients</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports on Sales Orders</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Marketing Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 22, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Current Sales</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-danger" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Urgent</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Sales for Today</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reviews of Products</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Sales Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 22, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Important Accounts</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-danger" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Urgent</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Contracts closed by a salesman</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports on Deals</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Marketing Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 21, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="border-bottom">
                      <div class="d-flex align-items-start mb-1">
                        <div class="form-check mb-0">
                          <input class="form-check-input" type="checkbox" />
                        </div>
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-1 lh-sm title line-clamp-1 me-sm-4" href="../../apps/crm/reports-details.html">Useful Solutions</a>
                          <div class="d-flex align-items-center"><span class="fa-solid fa-circle me-1 text-danger" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900 lh-2">Urgent</span></div>
                        </div>
                      </div>
                      <p class="fs--1 fw-semi-bold text-900 ms-4 text mb-4 ps-2">Obtaining leads today</p>
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                      <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semi-bold fs--1" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports by email</a></div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 reports">Hr Reports</p>
                        </div>
                      </div>
                      <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                          <p class="mb-0 fs--1 fw-semi-bold text-700 date">Dec 20, 2022</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row align-items-center justify-content-between py-2 pe-0 fs--1 mt-2">
              <div class="col-auto d-flex">
                <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
              </div>
              <div class="col-auto d-flex">
                <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="mb-0 pagination"></ul>
                <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
              </div>
            </div>
          </div>
        </div>
       
        
    @push('scripts') 
    <script src="{{asset('vendors/choices/choices.min.js')}}"></script>
  @endpush
        @endsection