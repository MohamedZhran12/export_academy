<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/includes/init.php");

?>

<div class="header-in-consult">
  <div class="overlay-white">
    <div class="container">
      <div class="header-in-topic">
        <h1>Consulting Service</h1>
        <div class="breadcrumb-in">
          <p class="link"><a href="index.php">HOME</a></p>
          <p class="link-at">Consulting Service</p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="background-white">
  <div class="container">
    <div class="padding-100">

      <p class="text-justify">Malaysian Export Academy Sdn Bhd offers different types of one-to-one online consulting
        services together with advisory and mentoring programs to meet our customer’s needs! We focus on both, long and
        short term.
        <br><br><br>

        <b>Consulting Services Provided (click on the categories to see our list of consultants):</b></p>

      <br>


      <div class="row">
        <section class="faq-section">
          <div class="container">
            <div class="row">

              <div class="col-md-12 offset-md-0">
                <div class="faq" id="accordion">

                  <div class="card">
                    <div class="card-header" id="faqHeading-1">
                      <div class="mb-0">
                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1"
                            data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                          <span class="badge">1</span>Financial Planning, Accounting & SST Consultancy
                        </h5>
                      </div>
                    </div>
                    <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                      <div class="card-body">
                        <p><b>Financial Planning, Accounting & SST Consultancy</b></p>
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="width-25">Consultant</th>
                            <th scope="col">Areas of Expertise</th>
                            <th scope="col">Apply</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td><b>Tan Kok Tee</b></td>
                            <td>CFO services, Monitoring Accountant services, SST implementation advise and review,
                              Business Planning / Budgeting, Strategic Management, Financial Performance Management,
                              SOPs development and implementation
                            </td>

                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Tan Kok Tee'/>
                                <input name='expertise' type="hidden"
                                       value='CFO services, Monitoring Accountant services, SST implementation advise and review, Business Planning / Budgeting, Strategic Management, Financial Performance Management, SOPs development and implementation'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>

                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td><b>Hari Ramulu A/L Munusamy</b></td>
                            <td>Tax Planning, Financial Planning, SST, Business Startup, Financial Account, Management
                              Accounting, Forensic Accounting, Internal Auditing, External Auditing, Financial Fraud
                              Investigation, Tax Investigation
                            </td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Hari Ramulu A/L Munusamy'/>
                                <input name='expertise' type="hidden"
                                       value='Tax Planning, Financial Planning, SST, Business Startup, Financial Account, Management Accounting, Forensic Accounting, Internal Auditing, External Auditing, Financial Fraud Investigation, Tax Investigation'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="faqHeading-2">
                      <div class="mb-0">
                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2"
                            data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                          <span class="badge">2</span> Business Startup Consultancy
                        </h5>
                      </div>
                    </div>
                    <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                      <div class="card-body">
                        <p><b>Business Startup Consultancy</b></p>
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="width-25">Consultant</th>
                            <th scope="col">Areas of Expertise</th>
                            <th scope="col">Apply</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td><b>Elton Chuah</b></td>
                            <td>Business Startup & Digital Marketing</td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Elton Chuah'/>
                                <input name='expertise' type="hidden" value='Business Startup & Digital Marketing'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td><b>Hari Ramulu a/l Munusamy</b></td>
                            <td>Tax Planning, Financial Planning, SST, Business Startup, Financial Account, Management
                              Accounting, Forensic Accounting, Internal Auditing, External Auditing, Financial Fraud
                              Investigation, Tax Investigation
                            </td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Hari Ramulu A/L Munusamy'/>
                                <input name='expertise' type="hidden"
                                       value='Tax Planning, Financial Planning, SST, Business Startup, Financial Account, Management Accounting, Forensic Accounting, Internal Auditing, External Auditing, Financial Fraud Investigation, Tax Investigation'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td><b>Mark Ho</b></td>
                            <td>Business Startup & Import and Export</td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Mark Ho'/>
                                <input name='expertise' type="hidden" value='Business Startup & Import and Export'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="faqHeading-3">
                      <div class="mb-0">
                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3"
                            data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                          <span class="badge">3</span>Digital & Social Media Marketing Consultancy
                        </h5>
                      </div>
                    </div>
                    <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                      <div class="card-body">
                        <p><b>Digital & Social Media Marketing Consultancy</b></p>
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="width-25">Consultant</th>
                            <th scope="col">Areas of Expertise</th>
                            <th scope="col">Apply</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td><b>Elton Chuah</b></td>
                            <td>Business Startup & Digital Marketing</td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Elton Chuah'/>
                                <input name='expertise' type="hidden" value='Business Startup & Digital Marketing'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="faqHeading-4">
                      <div class="mb-0">
                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-4"
                            data-aria-expanded="false" data-aria-controls="faqCollapse-4">
                          <span class="badge">4</span> Tax Consultancy
                        </h5>
                      </div>
                    </div>
                    <div id="faqCollapse-4" class="collapse" aria-labelledby="faqHeading-4" data-parent="#accordion">
                      <div class="card-body">
                        <p><b>Tax Consultancy</b></p>
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="width-25">Consultant</th>
                            <th scope="col">Areas of Expertise</th>
                            <th scope="col">Apply</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td><b>Hari Ramulu a/l Munusamy</b></td>
                            <td>Tax Planning, Financial Planning, SST, Business Startup, Financial Account, Management
                              Accounting, Forensic Accounting, Internal Auditing, External Auditing, Financial Fraud
                              Investigation, Tax Investigation
                            </td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Hari Ramulu A/L Munusamy'/>
                                <input name='expertise' type="hidden"
                                       value='Tax Planning, Financial Planning, SST, Business Startup, Financial Account, Management Accounting, Forensic Accounting, Internal Auditing, External Auditing, Financial Fraud Investigation, Tax Investigation'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="faqHeading-5">
                      <div class="mb-0">
                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-5"
                            data-aria-expanded="false" data-aria-controls="faqCollapse-5">
                          <span class="badge">5</span> Import & Export Consultancy
                        </h5>
                      </div>
                    </div>
                    <div id="faqCollapse-5" class="collapse" aria-labelledby="faqHeading-5" data-parent="#accordion">
                      <div class="card-body">
                        <p><b>Import & Export Consultancy</b></p>
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="width-25">Consultant</th>
                            <th scope="col">Areas of Expertise</th>
                            <th scope="col">Apply</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td><b>Noel Vong</b></td>
                            <td>Import & Export and Trade & Documentation</td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Noel Vong'/>
                                <input name='expertise' type="hidden"
                                       value='Import & Export and Trade & Documentation'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td><b>Stephen Kum</b></td>
                            <td>Import Export Trade Management, Shipping and Logistics Management & Procurement and
                              Supplier Management
                            </td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Stephen Kum'/>
                                <input name='expertise' type="hidden"
                                       value='Import Export Trade Management, Shipping and Logistics Management & Procurement and Supplier Management'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td><b>Mark Ho</b></td>
                            <td>Business Startup & Import and Export</td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Mark Ho'/>
                                <input name='expertise' type="hidden" value='Business Startup & Import and Export'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td><b>Jimmy Puah</b></td>
                            <td>Import & Export and Trade & Documentation</td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Jimmy Puah'/>
                                <input name='expertise' type="hidden"
                                       value='Import & Export and Trade & Documentation'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="faqHeading-6">
                      <div class="mb-0">
                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-6"
                            data-aria-expanded="false" data-aria-controls="faqCollapse-6">
                          <span class="badge">6</span> Trade & Documentation Consultancy
                        </h5>
                      </div>
                    </div>
                    <div id="faqCollapse-6" class="collapse" aria-labelledby="faqHeading-6" data-parent="#accordion">
                      <div class="card-body">
                        <p><b>Trade & Documentation Consultancy</b></p>
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="width-25">Consultant</th>
                            <th scope="col">Areas of Expertise</th>
                            <th scope="col">Apply</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td><b>Noel Vong</b></td>
                            <td>Import & Export and Trade & Documentation</td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Noel Vong'/>
                                <input name='expertise' type="hidden"
                                       value='Import & Export and Trade & Documentation'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td><b>Stephen Kum</b></td>
                            <td>Import Export Trade Management, Shipping and Logistics Management & Procurement and
                              Supplier Management
                            </td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Stephen Kum'/>
                                <input name='expertise' type="hidden"
                                       value='Import Export Trade Management, Shipping and Logistics Management & Procurement and Supplier Management'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td><b>Jimmy Puah</b></td>
                            <td>Import & Export and Trade & Documentation</td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Jimmy Puah'/>
                                <input name='expertise' type="hidden"
                                       value='Import & Export and Trade & Documentation'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="faqHeading-7">
                      <div class="mb-0">
                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-7"
                            data-aria-expanded="false" data-aria-controls="faqCollapse-7">
                          <span class="badge">7</span> Halal Consultancy
                        </h5>
                      </div>
                    </div>
                    <div id="faqCollapse-7" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                      <div class="card-body">
                        <p><b>Halal Consultancy</b></p>
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="width-25">Consultant</th>
                            <th scope="col">Areas of Expertise</th>
                            <th scope="col">Apply</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td><b>Wan Johari Mohd Daud</b></td>
                            <td>Halal</td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Wan Johari Mohd Daud'/>
                                <input name='expertise' type="hidden" value='Halal'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="faqHeading-8">
                      <div class="mb-0">
                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-8"
                            data-aria-expanded="false" data-aria-controls="faqCollapse-8">
                          <span class="badge">8</span> HR and Payroll Consultancy
                        </h5>
                      </div>
                    </div>
                    <div id="faqCollapse-8" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                      <div class="card-body">
                        <p><b>HR and Payroll Consultancy</b></p>
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="width-25">Consultant</th>
                            <th scope="col">Areas of Expertise</th>
                            <th scope="col">Apply</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td><b>Karen Sim</b></td>
                            <td>Payroll compliance, Payroll Analysis, How to submit Form-E (CP8D) and Data Praisi,
                              Talent Acquisition - Profiling Assessment and Matching, Tips for Interviewer and
                              Interviewee, HR Policies and Procedures, HR Technology Transformation, Performance
                              Tracking, The importance of Orientation and Exit Interview & How to think like an employer
                            </td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Karen Sim'/>
                                <input name='expertise' type="hidden"
                                       value='Payroll compliance, Payroll Analysis, How to submit Form-E (CP8D) and Data Praisi, Talent Acquisition - Profiling Assessment and Matching, Tips for Interviewer and Interviewee, HR Policies and Procedures, HR Technology Transformation, Performance Tracking, The importance of Orientation and Exit Interview & How to think like an employer'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="faqHeading-9">
                      <div class="mb-0">
                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-9"
                            data-aria-expanded="false" data-aria-controls="faqCollapse-9">
                          <span class="badge">9</span> Others
                        </h5>
                      </div>
                    </div>
                    <div id="faqCollapse-9" class="collapse" aria-labelledby="faqHeading-9" data-parent="#accordion">
                      <div class="card-body">
                        <p><b>Procurement and Supplier Management Consultancy</b></p>
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="width-25">Consultant</th>
                            <th scope="col">Areas of Expertise</th>
                            <th scope="col">Apply</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td><b>Stephen Kum</b></td>
                            <td>Import Export Trade Management, Shipping and Logistics Management & Procurement and
                              Supplier Management
                            </td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Stephen Kum'/>
                                <input name='expertise' type="hidden"
                                       value='Import Export Trade Management, Shipping and Logistics Management & Procurement and Supplier Management'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          </tbody>
                        </table>

                        <br><br>

                        <p><b>KPI & Interviewing Skills Consultancy</b></p>
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="width-25">Consultant</th>
                            <th scope="col">Areas of Expertise</th>
                            <th scope="col">Apply</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td><b>Karen Sim</b></td>
                            <td>Payroll compliance, Payroll Analysis, How to submit Form-E (CP8D) and Data Praisi,
                              Talent Acquisition - Profiling Assessment and Matching, Tips for Interviewer and
                              Interviewee, HR Policies and Procedures, HR Technology Transformation, Performance
                              Tracking, The importance of Orientation and Exit Interview & How to think like an employer
                            </td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Karen Sim'/>
                                <input name='expertise' type="hidden"
                                       value='Payroll compliance, Payroll Analysis, How to submit Form-E (CP8D) and Data Praisi, Talent Acquisition - Profiling Assessment and Matching, Tips for Interviewer and Interviewee, HR Policies and Procedures, HR Technology Transformation, Performance Tracking, The importance of Orientation and Exit Interview & How to think like an employer'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          </tbody>
                        </table>

                        <br><br>

                        <p><b>Organisational Development Consultancy</b></p>
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="width-25">Consultant</th>
                            <th scope="col">Areas of Expertise</th>
                            <th scope="col">Apply</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td><b>Vanaja Sangarajoo</b></td>
                            <td>Organization Development Consultancy</td>
                            <td>
                              <form action='consultancy-form.php' type='GET'>
                                <input name='consultant' type="hidden" value='Vanaja Sangarajoo'/>
                                <input name='expertise' type="hidden" value='Organization Development Consultancy'/>
                                <input type='submit' class="form" value='ENQUIRE NOW'/>
                              </form>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </section>

      </div>


      <br><br>
      <p>
        <b>Terms and Conditions:</b>
      </p>
      <ul>
        <li>The rate of each consultant vary based on their knowledge and expertise. The rates are based on hourly
          basis.
        </li>
        <li>Please state your date, time & duration - hourly / long term (please specify the duration)</li>
        <li>Once the form is submitted, our team will liase with the consultant's availability and get back to you as
          soon as possible.
        </li>
        <li>After confirmation from both parties, an upfront payment is required.</li>
      </ul>
    </div>
  </div>
</div>


<?php
  require_once($includes . 'footer.php');
?>

