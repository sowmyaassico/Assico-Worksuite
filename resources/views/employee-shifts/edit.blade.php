<link rel="stylesheet" href="{{ asset('vendor/css/bootstrap-colorpicker.css') }}" />

<div class="modal-header">
    <h5 class="modal-title">@lang('app.updateShift')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>

<div class="modal-body">
    <div class="portlet-body">
        <x-form id="createTicket" method="PUT" class="ajax-form">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bootstrap-timepicker">
                            <x-forms.text :fieldLabel="__('modules.attendance.shiftName')" :fieldPlaceholder="__('placeholders.shiftName')" fieldName="shift_name"
                                fieldId="shift_name" fieldRequired="true" :fieldValue="$employeeShift->shift_name" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <x-forms.text :fieldLabel="__('modules.attendance.shiftShortCode')" fieldName="shift_short_code" fieldId="shift_short_code"
                            :fieldPlaceholder="__('placeholders.shiftShortCode')" :fieldValue="$employeeShift->shift_short_code" fieldRequired="true" />
                    </div>

                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <x-forms.label fieldId="colorselector" fieldRequired="true" :fieldLabel="__('modules.sticky.colors')">
                            </x-forms.label>
                            <x-forms.input-group id="colorpicker">
                                <input type="text" class="form-control height-35 f-14"
                                    placeholder="{{ __('placeholders.colorPicker') }}" name="color"
                                    id="colorselector">

                                <x-slot name="append">
                                    <span class="input-group-text height-35 colorpicker-input-addon"><i></i></span>
                                </x-slot>
                            </x-forms.input-group>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bootstrap-timepicker">
                            <x-forms.text :fieldLabel="__('modules.attendance.officeStartTime')" :fieldPlaceholder="__('placeholders.hours')" fieldName="office_start_time"
                                fieldId="office_start_time" fieldRequired="true" :fieldValue="\Carbon\Carbon::createFromFormat(
                                    'H:i:s',
                                    $employeeShift->office_start_time,
                                )->translatedFormat(company()->time_format)" />
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bootstrap-timepicker">
                            <x-forms.text :fieldLabel="__('modules.attendance.officeEndTime')" :fieldPlaceholder="__('placeholders.hours')" fieldName="office_end_time"
                                fieldId="office_end_time" fieldRequired="true" :fieldValue="\Carbon\Carbon::createFromFormat('H:i:s', $employeeShift->office_end_time)->format(
                                    company()->time_format,
                                )" />
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bootstrap-timepicker">
                            <x-forms.number :fieldLabel="__('modules.attendance.autoClockOutTIme')" :fieldPlaceholder="__('placeholders.hours')" fieldName="auto_clock_out_time"
                                          fieldId="auto_clock_out_time" fieldRequired="true" :fieldValue="$employeeShift->auto_clock_out_time"  minValue="1" maxValue="12" :popover="__('messages.autoClockOut')" />
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="bootstrap-timepicker">
                            <x-forms.text :fieldLabel="__('modules.attendance.halfDayMarkTime')" :fieldPlaceholder="__('placeholders.hours')" fieldName="halfday_mark_time"
                                fieldId="halfday_mark_time" fieldRequired="true" :fieldValue="!is_null($employeeShift->halfday_mark_time) ? \Carbon\Carbon::createFromFormat(
                                    'H:i:s',
                                    $employeeShift->halfday_mark_time,
                                )->translatedFormat(company()->time_format) : ''" />
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <x-forms.number fieldName="early_clock_in" fieldId="early_clock_in"
                        :fieldLabel="__('modules.attendance.earlyClockIn')" :fieldValue="$employeeShift->early_clock_in"/>
                    </div>

                    <div class="col-lg-3">
                        <x-forms.number class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.attendance.lateMark')" fieldName="late_mark_duration"
                            fieldId="late_mark_duration" fieldRequired="true" :fieldValue="$employeeShift->late_mark_duration" />
                    </div>

                    <div class="col-lg-3">
                        <x-forms.number class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.attendance.checkininday')" fieldName="clockin_in_day"
                            fieldId="clockin_in_day" fieldRequired="true" :fieldValue="$employeeShift->clockin_in_day" />
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group my-3">
                            <x-forms.label fieldId="office_open_days" :fieldLabel="__('modules.attendance.officeOpenDays')" fieldRequired="true">
                            </x-forms.label>
                            <div class="d-lg-flex d-sm-block justify-content-between ">
                                <x-forms.weeks fieldName="office_open_days[]" :checkedDays="$openDays"></x-forms.weeks>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </x-form>
    </div>
</div>
<div class="modal-footer">
    <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
    <x-forms.button-primary id="save-employee-shift" icon="check">@lang('app.save')</x-forms.button-primary>
</div>

<script src="{{ asset('vendor/jquery/bootstrap-colorpicker.js') }}"></script>
<script>
    $('#colorpicker').colorpicker({
        "color": "{{ $employeeShift->color }}"
    });

    $('#office_end_time, #office_start_time, #halfday_mark_time').timepicker({
        @if (company()->time_format == 'H:i')
            showMeridian: false,
        @endif
    });

    // save type
    $('#save-employee-shift').click(function() {
        $.easyAjax({
            url: "{{ route('employee-shifts.update', $employeeShift->id) }}",
            container: '#createTicket',
            type: "POST",
            blockUI: true,
            blockUI: '#save-employee-shift',
            disableButton: true,
            buttonSelector: '#save-signature',
            data: $('#createTicket').serialize(),
            success: function(response) {
                if (response.status == "success") {
                    window.location.reload();
                }
            }
        })
    });

    setTimeout(function(){
        $('[data-toggle="popover"]').popover(); 
    }, 300);
</script>
