@extends('master')
@section('content')

<shopindex inline-template>
	<div>
        <form action="#" @submit.prevent="searchData" method="GET">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-2 col-xs-6" v-if="step1">
                            <div class="form-group">
                                <label for="ref_no" class="control-label">Search</label>
                                <input type="text" name="everything" class="form-control" v-model="search.everything" placeholder="Search..">
                            </div>
                        </div>

                        <div class="col-md-2 col-xs-4 pull-right" v-if="step2">
                        	<div class="form-group">
                                <div class="row">
                                    <div class="col-md-9 col-xs-10 pull-right text-center">
                                        <select2 v-model="selected_page">
                                            <option value="50">50 /page</option>
                                            <option value="100">100 /page</option>
                                            <option value="200">200 /page</option>
                                        </select2>
                                        <span style="margin-top: 5px; font-size: 15px;" v-if="pagination.total">
                                            @{{pagination.from}} - @{{pagination.to}} (@{{pagination.total}})
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" v-if="step1">
                <div class="col-md-12 col-xs-12">
                    <div class="pull-left" style="margin-bottom: 20px;">
                        <button type="submit" class="btn btn-default btn-md">
                            <i class="glyphicon glyphicon-search"></i>
                            <span class="hidden-xs"> Search</span>
                        </button>
                        <span style="padding-left: 10px;">
                        	<i class="glyphicon glyphicon-repeat normal-right-spinner" v-if="searching"></i>
                        </span>
                    </div>
                </div>
            </div>
        </form>

        <div v-if="step2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr style="background-color: #a3a3c2;" class="inverse head">
                        <th class="col-md-1 text-center">
                            #
                        </th>
                        <th class="col-md-2 text-center">
                            <a href="#" @click="sortBy('name')">Name</a>
                            <span v-if="sortkey == 'name' && !reverse" class="fa fa-caret-down"></span>
                            <span v-if="sortkey == 'name' && reverse" class="fa fa-caret-up"></span>
                        </th>
                        <th class="col-md-2 text-center">
                            <a href="#" @click="sortBy('contact')">Contact</a>
                            <span v-if="sortkey == 'contact' && !reverse" class="fa fa-caret-down"></span>
                            <span v-if="sortkey == 'contact' && reverse" class="fa fa-caret-up"></span>
                        </th>
                    </tr>

                    <tr v-for="(shop, index) in list" @click="redirectEdit(shop.id)" class="row_edit">
                        <td class="col-md-1 text-center">
                            @{{ index + pagination.from }}
                        </td>
                        <td class="col-md-2 text-center">
                            @{{ shop.name }}
                        </td>
                        <td class="col-md-2 text-left">
                            @{{ shop.contact }}
                        </td>
                    </tr>
                    <tr v-if="! pagination.total">
                        <td colspan="14" class="text-center"> No Results Found </td>
                    </tr>
                </table>
            </div>
            <div class="pull-left">
                <pagination :pagination="pagination" :callback="fetchTable" :offset="4"></pagination>
            </div>
        </div>
	</div>
</shopindex>

@endsection