@extends('../admin_layouts.master')
@section('content')
                                            <div class="container-fluid">
                                                <div class="row">

                                                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 card">
                                                        <div class="main-left-container">
                                                            <section>
                                                                <div class="card">
                                                                    <div class="card-container p-0">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-12 col-lg-12 px-0">

                                                                                    <div class="section-header section-lessons-md">
                                                                                        <div class="section-header__title header-left--sm">
                                                                                            <h3 class="h3">
                                                                                                Question 1
                                                                                            </h3>
                                                                                        </div>
                                                                                        <div class="section-header__controls tab-head-container header-tabs--sm">
                                                                                            <ul class="theme-tabs">
                                                                                                <li class="theme-tab-item current">
                                                                                                    1
                                                                                                </li>

                                                                                                <li class="theme-tab-item">
                                                                                                    2
                                                                                                </li>
                                                                                                <li class="theme-tab-item">
                                                                                                    3
                                                                                                </li>
                                                                                                <li class="theme-tab-item">
                                                                                                    4
                                                                                                </li>
                                                                                                <li class="theme-tab-item">
                                                                                                    Add Question
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="section-content inline-content">
                                                                                        <div class="">
                                                                                            <section>
                                                                                                <div class="form-container">
                                                                                                    <form>
                                                                                                        <div class="container-fluid">
                                                                                                            <div class="row">
                                                                                                                <div class="col-12 col-lg-6">
                                                                                                                    <div class="section-header section-title-head section-lessons-md px-0">
                                                                                                                        <div class="section-header__title">
                                                                                                                            <h4 class="h4">
                                                                                                                                Question Details
                                                                                                                            </h4>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="input-fields-container">

                                                                                                                        <div class="form-group form-input-container">
                                                                                                                            <input type="text" class="form-control input__theme" name="" id="" aria-describedby="helpId" placeholder="Type Question">
                                                                                                                        </div>
                                                                                                                        <div class="form-group form-input-container">
                                                                                                                            <textarea class="form-control input__theme textarea__theme" name="" id="" rows="3" placeholder="Short Description"></textarea>
                                                                                                                        </div>
                                                                                                                        <div class="form-group form-input-container">
                                                                                                                            <textarea class="form-control input__theme textarea__theme textarea__lg" name="" id="" rows="6" placeholder="Long Description"></textarea>
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-12 col-lg-6">
                                                                                                                    <div>
                                                                                                                        <div class="container-fluid px-0">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-12 col-lg-12">
                                                                                                                                    <div class="section-header section-title-head section-lessons-md px-0">
                                                                                                                                        <div class="section-header__title">
                                                                                                                                            <h4 class="h4">
                                                                                                                                                Answer
                                                                                                                                            </h4>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="accordion-radio-options">

                                                                                                                                        <div class="accordion" id="accordionExample">
                                                                                                                                            <div class="card">
                                                                                                                                                <div class="card-header card-header-md" id="headingOne">
                                                                                                                                                    <h2 class="mb-0">
                                                                                                                                                        <button class="btn btn-link btn-block text-left multiple-choose-accordion" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                                                                                            Multiple
                                                                                                                                                            Choise
                                                                                                                                                        </button>
                                                                                                                                                    </h2>
                                                                                                                                                </div>

                                                                                                                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                                                                                                    <div class="card-body">
                                                                                                                                                        <div class="radio-cards">
                                                                                                                                                            <div class="row">
                                                                                                                                                                <div class="col-12 col-lg-12 px-0">
                                                                                                                                                                    <div class="checkbox-select-option">

                                                                                                                                                                        <div class="choose-answer">
                                                                                                                                                                            <input type="radio" id="test1" name="radio-group" checked>
                                                                                                                                                                            <label for="test1">Answer
                                                                                                                                                                                one</label>
                                                                                                                                                                            <img class="delete-button" src="../../assets/images/icons/delete-block.svg">
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="choose-answer">
                                                                                                                                                                            <input type="radio" id="test2" name="radio-group">
                                                                                                                                                                            <label for="test2">Answer
                                                                                                                                                                                two</label>
                                                                                                                                                                            <img class="delete-button" src="../../assets/images/icons/delete-block.svg">
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="choose-answer">
                                                                                                                                                                            <input type="radio" id="test3" name="radio-group">
                                                                                                                                                                            <label for="test3">Answer
                                                                                                                                                                                three</label>
                                                                                                                                                                            <img class="delete-button" src="../../assets/images/icons/delete-block.svg">
                                                                                                                                                                        </div>

                                                                                                                                                                        <div class="actions-created review-buttons review-button">
                                                                                                                                                                            <button type="button" class="btn btn-secondary ">
                                                                                                                                                                                Add
                                                                                                                                                                                Answer
                                                                                                                                                                            </button>
                                                                                                                                                                        </div>

                                                                                                                                                                    </div>

                                                                                                                                                                </div>

                                                                                                                                                            </div>

                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>



                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-12 col-lg-12">
                                                                                                                                    <div class="button-group btn-edit">
                                                                                                                                        <a href="./protocol.html" class="btn btn__theme ">Save
                                                                                                                                            Changes</a>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                    </form>
                                                                                                    </div>
                                                                                            </section>
                                                                                            </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                            </section>

                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
</div>
</div>

@endsection
<script>


</script>
