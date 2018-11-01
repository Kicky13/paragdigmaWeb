<section id="content" class="income_statement">	
	<div class="centering add_fix">
		<div class="col-md-12 nopadding" style="background:#F8F8F8;padding-top: 6px">
			
			<div class="col-md-12 nopadding col-xs-12" style="padding: 0 20px 10px 20px;">
				<div class="col-md-2 nopadding col-xs-12">
					<span class="tittle_head" id="tittle_head">COGS</span>
				</div>
				<div class="col-md-7 nopadding col-xs-12 finddata" align="center">
					Company
						<select id="opco" class="opco highlight_option">
							<option class="cement" value="1000">SMIG</option>
							<option class="cement" value="7000">Semen Indonesia</option>
							<option class="cement" value="3000">Semen Padang</option>
							<option class="cement" value="5000">Semen Gresik</option>
							<option class="cement" value="4000">Semen Tonasa</option>
							<option class="cement" value="6000">Thang Long</option>
						</select>&nbsp;&nbsp;
					Month
						<select id="month" class="month highlight_option">
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>&nbsp;&nbsp;
					Year
						<select id="year" class="year highlight_option">
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
						</select>&nbsp;&nbsp;&nbsp;
					<a class="highlight_option find" style="display: inline-block; margin-top: 8px; width: 60px;">
						<span>Find</span>
					</a>
				</div>
				<div class="col-md-3 nopadding col-xs-12 choosedata" align="right" style="padding-top: 10px">
				</div>
			</div>
			<div class="col-md-12 nopadding col-xs-12">
				<div class="col-md-8 nopadding groupCogs" style="padding: 15px 15px 20px;">
					<div class="chart" id="cogs_all" style="min-height: 250px; width: 100%;background: #fff"></div>
					<div class="col-md-12 nopadding col-xs-12" style="margin-top: 12px; padding: 0 20px 12px 20px;">
						<div class="col-md-6 nopadding col-xs-6">
							<span class="cogs_title" id="cogs_title" style="font-size: 24px; font-weight: 600; color: #083d7c">COGS</span>
						</div>
						<div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader1">
							<div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
								<span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
								<span id="itemActual1" style="font-size: 16px; font-weight: 600; color: #083d7c"> 1</span>
							</div>
							<div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
								<span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
								<span id="itemRKAP1" style="font-size: 16px; font-weight: 600; color: #083d7c"> 1</span>
							</div>
							<div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
								<span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
								<span id="itemMoM1" style="font-size: 16px; font-weight: 600; color: #083d7c"> 1</span>
							</div>
							<div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
								<span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
								<span id="itemYoY1" style="font-size: 16px; font-weight: 600; color: #083d7c"> 1</span>
							</div>
						</div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader2">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual2" style="font-size: 16px; font-weight: 600; color: #083d7c"> 2</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP2" style="font-size: 16px; font-weight: 600; color: #083d7c"> 2</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM2" style="font-size: 16px; font-weight: 600; color: #083d7c"> 2</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY2" style="font-size: 16px; font-weight: 600; color: #083d7c"> 2</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader3">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual3" style="font-size: 16px; font-weight: 600; color: #083d7c"> 3</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP3" style="font-size: 16px; font-weight: 600; color: #083d7c"> 3</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM3" style="font-size: 16px; font-weight: 600; color: #083d7c"> 3</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY3" style="font-size: 16px; font-weight: 600; color: #083d7c"> 3</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader4">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual4" style="font-size: 16px; font-weight: 600; color: #083d7c"> 4</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP4" style="font-size: 16px; font-weight: 600; color: #083d7c"> 4</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM4" style="font-size: 16px; font-weight: 600; color: #083d7c"> 4</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY4" style="font-size: 16px; font-weight: 600; color: #083d7c"> 4</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader5">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual5" style="font-size: 16px; font-weight: 600; color: #083d7c"> 5</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP5" style="font-size: 16px; font-weight: 600; color: #083d7c"> 5</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM5" style="font-size: 16px; font-weight: 600; color: #083d7c"> 5</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY5" style="font-size: 16px; font-weight: 600; color: #083d7c"> 5</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader6">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual6" style="font-size: 16px; font-weight: 600; color: #083d7c"> 6</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP6" style="font-size: 16px; font-weight: 600; color: #083d7c"> 6</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM6" style="font-size: 16px; font-weight: 600; color: #083d7c"> 6</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY6" style="font-size: 16px; font-weight: 600; color: #083d7c"> 6</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader7">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual7" style="font-size: 16px; font-weight: 600; color: #083d7c"> 7</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP7" style="font-size: 16px; font-weight: 600; color: #083d7c"> 7</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM7" style="font-size: 16px; font-weight: 600; color: #083d7c"> 7</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY7" style="font-size: 16px; font-weight: 600; color: #083d7c"> 7</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader8">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual8" style="font-size: 16px; font-weight: 600; color: #083d7c"> 8</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP8" style="font-size: 16px; font-weight: 600; color: #083d7c"> 8</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM8" style="font-size: 16px; font-weight: 600; color: #083d7c"> 8</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY8" style="font-size: 16px; font-weight: 600; color: #083d7c"> 8</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader9">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual9" style="font-size: 16px; font-weight: 600; color: #083d7c"> 9</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP9" style="font-size: 16px; font-weight: 600; color: #083d7c"> 9</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM9" style="font-size: 16px; font-weight: 600; color: #083d7c"> 9</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY9" style="font-size: 16px; font-weight: 600; color: #083d7c"> 9</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader10">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual10" style="font-size: 16px; font-weight: 600; color: #083d7c"> 10</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP10" style="font-size: 16px; font-weight: 600; color: #083d7c"> 10</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM10" style="font-size: 16px; font-weight: 600; color: #083d7c"> 10</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY10" style="font-size: 16px; font-weight: 600; color: #083d7c"> 10</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader11">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual11" style="font-size: 16px; font-weight: 600; color: #083d7c"> 11</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP11" style="font-size: 16px; font-weight: 600; color: #083d7c"> 11</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM11" style="font-size: 16px; font-weight: 600; color: #083d7c"> 11</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY11" style="font-size: 16px; font-weight: 600; color: #083d7c"> 11</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader12">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual12" style="font-size: 16px; font-weight: 600; color: #083d7c"> 12</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP12" style="font-size: 16px; font-weight: 600; color: #083d7c"> 12</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM12" style="font-size: 16px; font-weight: 600; color: #083d7c"> 12</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY12" style="font-size: 16px; font-weight: 600; color: #083d7c"> 12</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader13">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual13" style="font-size: 16px; font-weight: 600; color: #083d7c"> 13</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP13" style="font-size: 16px; font-weight: 600; color: #083d7c"> 13</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM13" style="font-size: 16px; font-weight: 600; color: #083d7c"> 13</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY13" style="font-size: 16px; font-weight: 600; color: #083d7c"> 13</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader14">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual14" style="font-size: 16px; font-weight: 600; color: #083d7c"> 14</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP14" style="font-size: 16px; font-weight: 600; color: #083d7c"> 14</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM14" style="font-size: 16px; font-weight: 600; color: #083d7c"> 14</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY14" style="font-size: 16px; font-weight: 600; color: #083d7c"> 14</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader15">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual15" style="font-size: 16px; font-weight: 600; color: #083d7c"> 15</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP15" style="font-size: 16px; font-weight: 600; color: #083d7c"> 15</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM15" style="font-size: 16px; font-weight: 600; color: #083d7c"> 15</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY15" style="font-size: 16px; font-weight: 600; color: #083d7c"> 15</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader16">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual16" style="font-size: 16px; font-weight: 600; color: #083d7c"> 16</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP16" style="font-size: 16px; font-weight: 600; color: #083d7c"> 16</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM16" style="font-size: 16px; font-weight: 600; color: #083d7c"> 16</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY16" style="font-size: 16px; font-weight: 600; color: #083d7c"> 16</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader17">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual17" style="font-size: 16px; font-weight: 600; color: #083d7c"> 17</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP17" style="font-size: 16px; font-weight: 600; color: #083d7c"> 17</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM17" style="font-size: 16px; font-weight: 600; color: #083d7c"> 17</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY17" style="font-size: 16px; font-weight: 600; color: #083d7c"> 17</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader18">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual18" style="font-size: 16px; font-weight: 600; color: #083d7c"> 18</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP18" style="font-size: 16px; font-weight: 600; color: #083d7c"> 18</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM18" style="font-size: 16px; font-weight: 600; color: #083d7c"> 18</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY18" style="font-size: 16px; font-weight: 600; color: #083d7c"> 18</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader19">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual19" style="font-size: 16px; font-weight: 600; color: #083d7c"> 19</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP19" style="font-size: 16px; font-weight: 600; color: #083d7c"> 19</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM19" style="font-size: 16px; font-weight: 600; color: #083d7c"> 19</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY19" style="font-size: 16px; font-weight: 600; color: #083d7c"> 19</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader20">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual20" style="font-size: 16px; font-weight: 600; color: #083d7c"> 20</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP20" style="font-size: 16px; font-weight: 600; color: #083d7c"> 20</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM20" style="font-size: 16px; font-weight: 600; color: #083d7c"> 20</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY20" style="font-size: 16px; font-weight: 600; color: #083d7c"> 20</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader21">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual21" style="font-size: 16px; font-weight: 600; color: #083d7c"> 21</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP21" style="font-size: 16px; font-weight: 600; color: #083d7c"> 21</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM21" style="font-size: 16px; font-weight: 600; color: #083d7c"> 21</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY21" style="font-size: 16px; font-weight: 600; color: #083d7c"> 21</span>
                            </div>
                        </div>
                        <div class="col-md-6 nopadding col-xs-6 itemHeader" id="itemHeader22">
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Actual</span><br>
                                <span id="itemActual22" style="font-size: 16px; font-weight: 600; color: #083d7c"> 22</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">RKAP</span><br>
                                <span id="itemRKAP22" style="font-size: 16px; font-weight: 600; color: #083d7c"> 22</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth MoM</span><br>
                                <span id="itemMoM22" style="font-size: 16px; font-weight: 600; color: #083d7c"> 22</span>
                            </div>
                            <div class="col-xs-3 nopadding" align="center" style="padding-right: 8px;">
                                <span style="font-size: 14px; font-weight: 400; color: #083d7c">Growth YoY</span><br>
                                <span id="itemYoY22" style="font-size: 16px; font-weight: 600; color: #083d7c"> 22</span>
                            </div>
                        </div>
					</div>
					 <div class="col-md-12 nopadding col-xs-12" style="padding: 0 20px 12px 20px;">
						<div class="chart chartCogs" id="chartCogs1" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs2" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs3" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs4" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs5" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs6" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs7" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs8" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs9" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs10" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs11" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs12" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs13" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs14" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs15" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs16" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs17" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs18" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs19" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs20" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs21" style="min-height: 300px; width: 100%"></div>
		                <div class="chart chartCogs" id="chartCogs22" style="min-height: 300px; width: 100%"></div>
					</div>
				</div>
				
				<div class="col-md-4 nopadding" style="padding: 0 12px 20px;">
					<div class="col-xs-12 nopadding highlight"  style="padding: 5px 20px 12px 20px;">
						<div class="col-xs-12 nopadding jenisCogs">
							<div class="col-xs-6 nopadding" style="padding: 10px 20px 10px 0;display:inline-block">
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(1, 'COGS')" id="cogs1">COGS</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(2, 'BAHAN BAKAR')" id="cogs2">BAHAN BAKAR</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(3, 'BATUBARA')" id="cogs3">BATUBARA</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(4, 'INDEKS BATUBARA')" id="cogs4">INDEKS BATUBARA</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(5, 'IDO')" id="cogs5">IDO</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(6, 'BAHAN BAKU')" id="cogs6">BAHAN BAKU</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(7, 'BATU KAPUR')" id="cogs7">BATU KAPUR</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(8, 'INDEKS BATU KAPUR')" id="cogs8">INDEKS BATU KAPUR</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(9, 'GYPSUM')" id="cogs9">GYPSUM</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(10, 'INDEKS GYPSUM')" id="cogs10">INDEKS GYPSUM</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(11, 'TANAH LIAT')" id="cogs11">TANAH LIAT</a></div>
			                </div>
			                <div class="col-xs-6 nopadding" style="padding: 10px 0 10px 10px;display:inline-block">
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(12, 'INDEKS TANAH LIAT')" id="cogs12">INDEKS TANAH LIAT</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(13, 'LISTRIK')" id="cogs13">LISTRIK</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(14, 'INDEKS LISTRIK')" id="cogs14">INDEKS LISTRIK</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(15, 'LISTRIK PLN')" id="cogs15">LISTRIK PLN</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(16, 'BTG')" id="cogs16">BTG</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(17, 'PEMELIHARAAN')" id="cogs17">PEMELIHARAAN</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(18, 'KEMASAN')" id="cogs18">KEMASAN</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(19, 'KRAFT')" id="cogs19">KRAFT</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(20, 'WOVEN')" id="cogs20">WOVEN</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(21, 'PENIAGAAN VIA DARAT')" id="cogs21">PENIAGAAN VIA DARAT</a></div>
			                    <div class="col-xs-12 highlight active" style="margin: 10px 0px 10px 0px;"><span><a href="javascript:changeItem(22, 'PENIAGAAN VIA LAUT')" id="cogs22">PENIAGAAN VIA LAUT</a></div>
			                </div>
			            </div>

					</div>	
				</div>
			</div>
	</div>

</section><!--/#content -->
<style type="text/css">
	.inc div b{font-size:20px;}
</style>
<script type="text/javascript" src="assets/js/modernizr-2.7.1.custom.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/bullet.js"></script>
<script type="text/javascript" src="assets/js/cogs.js"></script>