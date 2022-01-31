<!-- Template javascript -->
<script src="<?php echo base_url('js/basic.js?q=' . time()); ?>"></script>
<style>
    td {
        font-size: 14px;
        padding: 4px;
    }
    .row {
        margin: 0px;
    }
</style>

<script>

    var Timer;
    var TotalSeconds;

    function CreateTimer(TimerID, Time) {
        Timer = document.getElementById(TimerID);
        TotalSeconds = Time;
        UpdateTimer()
        window.setTimeout("Tick()", 1000);
    }

    function Tick() {
        if (TotalSeconds <= 0) {
            alert("¡Se acabó el tiempo!")
            return;
        }
        TotalSeconds -= 1;
        UpdateTimer()
        window.setTimeout("Tick()", 1000);
    }

    function UpdateTimer() {
        var Seconds = TotalSeconds;
        var Days = Math.floor(Seconds / 86400);
        Seconds -= Days * 86400;
        var Hours = Math.floor(Seconds / 3600);
        Seconds -= Hours * (3600);
        var Minutes = Math.floor(Seconds / 60);
        Seconds -= Minutes * (60);
        var TimeStr = ((Days > 0) ? Days + " days " : "") + LeadingZero(Hours) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds)
        Timer.innerHTML = TimeStr;
    }


    function LeadingZero(Time) {
        return (Time < 10) ? "0" + Time : +Time;
    }

    //var myCountdown1 = new Countdown({time:<?php echo $seconds;?>, rangeHi:"hour", rangeLo:"second"});
    setTimeout(submitform, '<?php echo $seconds * 1000;?>');

    function submitform() {
        alert('Se acabó el tiempo');
        window.location = "<?php echo site_url('quiz/submit_quiz/');?>";
    }


</script>

<div class="">
    <div class="row bg bg-primary">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <h4 class="text-white"><?php echo $title; ?></h4>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <div class="row">
                <div class="col-11 col-sm-11 col-md-11 col-lg-11">
                    <h5 class="text-white float-lg-right float-md-right">Tiempo restante: <span id='timer'></h5>
                </div>
                <div class="col-1 col-sm-1 col-md-1 col-lg-1">
                    <div class="save_answer_signal" id="save_answer_signal2"></div>
                    <div class="save_answer_signal" id="save_answer_signal1"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <!-- Category button -->
            <div class="row" style="margin:2px;">
                <?php
                $categories = explode(',', $quiz['categories']);
                $category_range = explode(',', $quiz['category_range']);

                function getfirstqn($cat_keys = '0', $category_range)
                {
                    if ($cat_keys == 0) {
                        return 0;
                    } else {
                        $r = 0;
                        for ($g = 0; $g < $cat_keys; $g++) {
                            $r += $category_range[$g];
                        }
                        return $r;
                    }
                }


                if (count($categories) > 1) {
                    $jct = 0;
                    foreach ($categories as $cat_key => $category) {
                        ?>
                        <a href="javascript:switch_category('cat_<?php echo $cat_key; ?>');"
                           class="btn btn-outline-dark"
                           style="cursor:pointer;margin-left:5px;"><?php echo $category; ?></a>
                        <input type="hidden" id="cat_<?php echo $cat_key; ?>"
                               value="<?php echo getfirstqn($cat_key, $category_range); ?>">
                        <?php
                    }
                }
                ?>
            </div>
            <form method="post" action="<?php echo site_url('quiz/submit_quiz/' . $quiz['rid']); ?>" id="quiz_form">
                <input type="hidden" name="rid" value="<?php echo $quiz['rid']; ?>">
                <input type="hidden" name="noq" value="<?php echo $quiz['noq']; ?>">
                <input type="hidden" name="individual_time" id="individual_time"
                       value="<?php echo $quiz['individual_time']; ?>">

                <?php
                $abc = [
                    '0' => 'A', '1' => 'B', '2' => 'C', '3' => 'D',
                    '4' => 'E', '5' => 'F', '6' => 'G', '7' => 'H',
                    '8' => 'I', '9' => 'J', '10' => 'K'
                ];
                foreach ($questions as $qk => $question) {
                    ?>
                    <div id="q<?php echo $qk; ?>" class="question_div">
                        <div class="question_container">
                            <?php
                            echo "<h1>" . $question['qid'] . "</h1>";
                            if (strip_tags($question['paragraph']) != "") {
                                echo $this->lang->line('paragraph') . "<br>";
                                echo $question['paragraph'] . "<hr>";
                            }
                            ?>
                            <?php echo $this->lang->line('question') . ' ' . ($qk + 1) . ' ) <br>';
                            echo str_replace('../../../', base_url(), str_replace('../../../../', base_url(), $question['question']));
                            ?>
                        </div>
                        <div class="option_container">
                            <?php
                            // multiple single choice
                            if ($question['question_type'] == ('multiple_choice_single_answer')) {
                                $save_ans = array();
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans[] = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden" name="question_type[]" id="q_type<?php echo $qk; ?>" value="1">
                                <?php
                                $i = 0;
                                $order = range(0, 4);
                                shuffle($order);
                                ?>
                                <div class="d-flex flex-column">
                                    <?php
                                    $k = 0;
                                    foreach ($options as $ok => $option) {
                                        if ($option['qid'] == $question['qid']) {
                                            ?>
                                            <div class="row order-<?php echo $order[$k]; ?>">
                                                <div class="" style="width: 30px;">
                                                    <?php echo $abc[$order[$k++]] . ')&ensp;'; ?>
                                                </div>
                                                <div class="" style="10px;">
                                                    <input type="radio" name="answer[<?php echo $qk; ?>][]"
                                                           id="answer_value<?php echo $qk . '-' . $i; ?>"
                                                           value="<?php echo $option['oid']; ?>" <?php
                                                    if (in_array($option['oid'], $save_ans)) {
                                                        echo 'checked';
                                                    } ?> >
                                                </div>
                                                <div class="">
                                                    <?php echo '&ensp;&ensp;' . $option['q_option']; ?>
                                                </div>
                                            </div>
                                            <?php
                                            $i += 1;
                                        } else {
                                            $i = 0;
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                            }

                            // multiple_choice_multiple_answer
                            if ($question['question_type'] == ('multiple_choice_multiple_answer')) {
                                $save_ans = [];
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans[] = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden" name="question_type[]" id="q_type<?php echo $qk; ?>" value="2">
                                <?php
                                $i = 0;
                                $order = range(0, 4);
                                shuffle($order);
                                ?>
                                <div class="d-flex flex-column">
                                    <?php
                                    $k = 0;
                                    foreach ($options as $ok => $option) {
                                        if ($option['qid'] == $question['qid']) {
                                            ?>
                                            <div class="row order-<?php echo $order[$k]; ?>">
                                                <div class="" style="width: 30px;">
                                                    <?php echo $abc[$order[$k++]] . ')'; ?>
                                                </div>
                                                <div class="" style="width: 10px;">
                                                    <input type="checkbox" name="answer[<?php echo $qk; ?>][]"
                                                           id="answer_value<?php echo $qk . '-' . $i; ?>"
                                                           value="<?php echo $option['oid']; ?>" <?php
                                                    if (in_array($option['oid'], $save_ans)) {
                                                        echo 'checked';
                                                    } ?> >
                                                </div>
                                                <div class="">
                                                    <?php echo '&ensp;&ensp;' . $option['q_option']; ?>
                                                </div>
                                            </div>
                                            <?php
                                            $i++;
                                        } else {
                                            $i = 0;
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                            }

                            // short answer
                            if ($question['question_type'] == ('short_answer')) {
                                $save_ans = "";
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden" name="question_type[]" id="q_type<?php echo $qk; ?>" value="3">
                                <?php
                                ?>
                                <div class="op">
                                    <div class="row">
                                        <div class="form-group" style="width: 100%;">
                                            <label for="">
                                                <?php echo $this->lang->line('answer'); ?>
                                            </label>
                                            <input type="text" name="answer[<?php echo $qk; ?>][]" class="form-control"
                                                   value="<?php echo $save_ans; ?>" id="answer_value<?php echo $qk; ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }

                            // long answer
                            if ($question['question_type'] == ('long_answer')) {
                                $save_ans = "";
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden" name="question_type[]" id="q_type<?php echo $qk; ?>" value="4">
                                <?php
                                ?>
                                <div class="op">
                                    <?php echo $this->lang->line('answer'); ?> <br>
                                    <?php echo $this->lang->line('word_counts'); ?> <span
                                            id="char_count<?php echo $qk; ?>">0</span>
                                    <textarea name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk; ?>"
                                              style="width:100%;height:100%;"
                                              onKeyup="count_char(this.value,'char_count<?php echo $qk; ?>');"><?php echo $save_ans; ?></textarea>
                                </div>
                                <?php
                            }

                            // matching
                            if ($question['question_type'] == ('match_the_column')) {
                                $save_ans = [];
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        // $exp_match=explode('__',$saved_answer['q_option_match']);
                                        $save_ans[] = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden" name="question_type[]" id="q_type<?php echo $qk; ?>" value="5">
                                <?php
                                $i = 0;
                                $match_1 = [];
                                $match_2 = [];
                                foreach ($options as $ok => $option) {
                                    if ($option['qid'] == $question['qid']) {
                                        $match_1[] = $option['q_option'];
                                        $match_2[] = $option['q_option_match'];
                                        $i += 1;
                                    } else {
                                        $i = 0;
                                    }
                                }
                                ?>
                                <div class="op">
                                    <table>
                                        <?php
                                        shuffle($match_1);
                                        shuffle($match_2);
                                        foreach ($match_1 as $mk1 => $mval) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $abc[$mk1]; ?>) <?php echo $mval; ?>
                                                </td>
                                                <td>
                                                    <select name="answer[<?php echo $qk; ?>][]" class="form-control"
                                                            id="answer_value<?php echo $qk . '-' . $mk1; ?>">
                                                        <option value="0"><?php echo $this->lang->line('select'); ?></option>
                                                        <?php
                                                        foreach ($match_2 as $mk2 => $mval2) {
                                                            ?>
                                                            <option value="<?php echo $mval . '___' . $mval2; ?>" <?php $m1 = $mval . '___' . $mval2;
                                                            if (in_array($m1, $save_ans)) {
                                                                echo 'selected ';
                                                            } ?> ><?php echo $mval2; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </form>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3"
             style="min-height:84%;padding-bottom: 200px;color:#212121;background:#CEDDF0;">
            <b> <?php echo $this->lang->line('questions'); ?></b>
            <div style="max-height:60%;overflow-y:auto;">
                <?php
                for ($j = 0; $j < $quiz['noq']; $j++) {
                    ?>
                    <div class="qbtn" onClick="save_show_next_question('<?php echo $j; ?>');"
                         id="qbtn<?php echo $j; ?>" style="border-radius: 10px"><?php echo($j + 1); ?></div>
                    <?php
                }
                ?>
            </div>
            <hr>
            <div id="indicators">
                <div class="row">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="qbtn bg bg-gradient-success float-right">
                        </div>&nbsp;
                    </div>
                    <div class="col-9 col-sm-9 col-md-9 col-lg-9 font-weight-bold pt-2">
                        <?php echo $this->lang->line('Answered'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="qbtn bg bg-gradient-danger float-right">
                        </div>
                    </div>
                    <div class="col-9 col-sm-9 col-md-9 col-lg-9 font-weight-bold pt-2">
                        <?php echo $this->lang->line('UnAnswered'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="qbtn bg bg-gradient-warning float-right">
                        </div>
                    </div>
                    <div class="col-9 col-sm-9 col-md-9 col-lg-9 font-weight-bold pt-2">
                        <?php echo $this->lang->line('Review-Later'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="qbtn float-right" style="background-color: black">
                        </div>
                    </div>
                    <div class="col-9 col-sm-9 col-md-9 col-lg-9 font-weight-bold pt-2">
                        <?php echo $this->lang->line('Not-visited'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_buttons bg bg-primary">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-2 col-lg-2 mb-2">
                <button class="btn btn-warning" onClick="javascript:review_later();"
                        style="width: 100%;"><?php echo $this->lang->line('review_later'); ?></button>
            </div>
            <div class="col-6 col-sm-6 col-md-2 col-lg-2 mb-2"
            ">
            <button class="btn btn-info" onClick="javascript:clear_response();"
                    style="width: 100%;"><?php echo $this->lang->line('clear'); ?></button>
        </div>
        <div class="col-6 col-sm-6 col-md-2 col-lg-2 mb-2">
            <button class="btn btn-secondary" id="backbtn" style="visibility:hidden; width: 100%;"
                    onClick="javascript:show_back_question();">
                <?php echo $this->lang->line('back'); ?></button>
        </div>
        <div class="col-6 col-sm-6 col-md-2 col-lg-2 mb-2">
            <button class="btn btn-success" id="nextbtn" onClick="javascript:show_next_question();"
                    style="width: 100%;"><?php echo $this->lang->line('save_next'); ?></button>
        </div>
        <div class="col-12 col-sm-12 col-md-2 col-lg-2 mb-2">
            <button class="btn btn-danger" onClick="javascript:cancelmove();"
                    style="width: 100%;"><?php echo $this->lang->line('submit_quiz'); ?></button>
        </div>
    </div>
</div>

<script>
    var ctime = 0;
    var ind_time = new Array();
    <?php
    $ind_time = explode(',', $quiz['individual_time']);
    for($ct = 0; $ct < $quiz['noq']; $ct++){
    ?>
    ind_time[<?php echo $ct;?>] =<?php if (!isset($ind_time[$ct])) {
        echo 0;
    } else {
        echo $ind_time[$ct];
    }?>;
    <?php
    }
    ?>
    noq = "<?php echo $quiz['noq'];?>";
    show_question('0');


    function increasectime() {
        ctime += 1;
    }

    setInterval(increasectime, 1000);
    setInterval(setIndividual_time, 30000);

    function save_show_next_question(nro) {
        javascript:change_question();
        javascript:show_question(nro);
    }
</script>


<div id="warning_div" class="bg bg-white"
     style="padding:10px; position:fixed;z-index:100;display:none;width:100%;border-radius:5px;height:200px; border:1px solid #dddddd;left:4px;top:70px;">
    <div style="text-align: center;"><b> <?php echo $this->lang->line('really_Want_to_submit'); ?></b> <br><br>
        <span id="processing"></span>
        <a href="javascript:cancelmove();" class="btn btn-danger"
           style="cursor:pointer;"><?php echo $this->lang->line('cancel'); ?></a> &nbsp; &nbsp; &nbsp; &nbsp;
        <a href="javascript:submit_quiz();" class="btn btn-info"
           style="cursor:pointer;"><?php echo $this->lang->line('submit_quiz'); ?></a>
    </div>
</div>

<script type="text/javascript">window.onload = CreateTimer("timer", <?php echo $seconds;?>);</script>