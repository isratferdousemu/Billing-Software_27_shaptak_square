

   
<html style="overflow: auto;" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"><head><style type="text/css" title="FrameworkTheme"></style>
    
    <!-- X-UA-Compatible tag must be at the top of the head section, or else it may be ignored by the browser. -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/SystemDataService/Content/Images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/SystemDataService/Content/Images/favicon.ico" type="image/x-icon">
    <title>Leve1 power diagram</title>
    
        <meta name="refresh_method" content="timer">
        
         <meta name="SaveInstance" content="fa4df848-c338-4bac-880e-9e5e15608e95">
         <meta name="SaveDateTime" content="2018-5-25T13:21:50">
    
        <!-- ***** Included Shared Content ***** -->
        <!-- **** Standard Content: BaseLibraries-Script-->
    <script src="/SystemDataService/Content/External/BaseLibraries-Script?v=IaI4UeOQR-NA06y2bA1IM9kqVqF8OlFZxm8DS-5wJ-g1"></script>
    
        <!-- **** Standard Content: jQuery-Style-->
    <link rel="stylesheet" type="text/css" href="/SystemDataService/Content/External/jquery/styles/jQuery-Style?v=cp-5reSwq5zKEBJsnTvB_6sDfTAPqgtGeKYvkAMg4DE1">
    <!-- **** Standard Content: jQuery-Script-->
    <script src="/SystemDataService/Content/External/jquery/jQuery-Script?v=UnC2U-VYHo8mvQ-uHyFHArbgmTRhDLgkIHK4vb6GOmc1"></script>
    
        <!-- **** Standard Content: Bootstrap-Style-->
    <link rel="stylesheet" type="text/css" href="/SystemDataService/Content/External/bootstrap/Bootstrap-Style?v=r4BqJ1ZsGlVewHa6MWBtJW6yf6vKvQepmCebbyyRM641">
    
        <!-- **** Standard Content: CoreFramework-Style-->
    <link rel="stylesheet" type="text/css" href="/SystemDataService/Content/Core/Styles/CoreFramework-Style?v=Wp800tnCGxeZqL2k0TZu6s3dyxVyXA8XzJgHneubgCU1">
    <!-- **** Standard Content: CoreFramework-Script-->
    <script src="/SystemDataService/Content/Core/Scripts/CoreFramework-Script?v=LXLzVf_l19DynebZSectwk0n7MQns2i52C--L6P1Oq81"></script>
    
        <!-- **** Standard Content: CommonControls-Style-->
    <link rel="stylesheet" type="text/css" href="/SystemDataService/Content/CommonControls/CommonControls-Style?v=cK5BcfAmVY2d6mFuxqw7YkmaXRrg_NCPZw77QSv0Wzw1">
    <!-- **** Standard Content: CommonControls-Script-->
    <script src="/SystemDataService/Content/CommonControls/CommonControls-Script?v=3liSnTIn8b7tOW5SqzsGctAbOg35mCJGZNn-r8_Ao801"></script>
    
        <!-- **** Standard Content: jqChart-Style-->
    <link rel="stylesheet" type="text/css" href="/SystemDataService/Content/External/jqchart/jqChart-Style?v=2qM5MfyqTmR43QkVbVjN-KO74LhKi-BdnBkg01QIxEM1">
    <!-- **** Standard Content: jqChart-Script-->
    <script src="/SystemDataService/Content/External/jqchart/jqChart-Script?v=ZF-LC_WqDoVc1rIjwQdul234VzkdlL1_uCAMBlIgZUQ1"></script>
    
            
        <!-- ***** App Specific Content ***** -->
        <script type="text/javascript" src="Scripts/realtime.js?v=9.1"></script>
        <script type="text/javascript" src="Scripts/linkManager.js?v=9.1"></script>
        <script type="text/javascript" src="Scripts/Views/Views.ControlActionDialog.js?v=9.1"></script>
        <script type="text/javascript" src="Scripts/Controllers/Controllers.ControlRequest.js?v=9.1"></script>
        <link rel="stylesheet" type="text/css" href="Styles/Site.css">
    
        <script type="text/javascript">
            //==== Client Framework Application Settings ====
    (function (fwk, undefined) {fwk.url['DefaultWebsiteUrl']='/Web';fwk.url['DiagramUrlFormatForDisplayName']='/ion/default.aspx?dgm=OPEN_TEMPLATE_DIAGRAM&HideBackToNetwork=1&displayNode={0}';fwk.url['DiagramUrlFormatForSystemName']='/ion/default.aspx?dgm=OPEN_TEMPLATE_DIAGRAM&HideBackToNetwork=1&Node={0}';fwk.url['Help']='help/{0}/Web%20Applications%20Help.htm';fwk.url['HierarchyViews']='/SystemDataService/Hierarchy/2015-07/View/All';fwk.url['HierarchyViewsWithTopics']='/SystemDataService/Hierarchy/2015-07/View/AllWithTopics';fwk.url['ImageManager']='/SystemDataService/Images/{0}/';fwk.url['Logout']='/Web/auth?LogOff=true&ReturnUrl={0}';fwk.url['RemoteAccessHost']='https://localhost/';fwk.url['RootService']='/SystemDataService';fwk.url['SettingsHelp']='help/{0}/Web%20Applications%20Help.htm#4%20Configuring/WebApps/Settings/Settings-Overview.htm';fwk.url['SourceMeasurement']='/SystemDataService/selection/DeviceTopicInformation?culture={0}&useCache=true';fwk.debug=false;fwk.palettes={};fwk.palettes.CurrentSeriesColors=["#ff5959","#4cd24f","#8bc2ff","#ffae57","#ababab"];fwk.palettes.DashboardBackground=["#f7f7f7","#ededed","#cbcbcb","#9fa0a4","#636468","#333333","#faeeec","#f9f0ea","#f5f5e7","#edf6e8","#ebf5ee","#ebf5f5","#edf5f8","#ecf4fd","#f4f3fe","#f9eefa","#faeef4","#f4f5f5","#8c7876","#8a7d73","#83836f","#788571","#75857a","#758483","#788389","#778291","#828091","#8a7a8c","#8b7983","#828384","#58201b","#532b12","#3a3c0d","#254212","#214226","#21403c","#243e4d","#233a61","#383363","#522352","#58213d","#393b3f"];fwk.palettes.DataSeries=["#609eec","#d28348","#75c163","#d669af","#b7b941","#a585eb","#93c9fb","#e9b891","#a8dfa2","#eaa7d4","#d9db85","#cebafa","#4b7cba","#a66838","#5c984d","#a9538b","#919233","#8269b9","#212121","#434343","#636468","#9fa0a4","#cbcbcb","#ededed","#5760d7","#bd2d18","#9fd241","#982042","#f1d344","#1a2e64"];fwk.palettes.ItemPriorityColors=["#C0C0C0","#219bfd","#f0d00c","#e34713"];fwk.palettes.PowerQualityDataSeriesColors=["#ffd100","#a585eb","#9fa0a4","#f4e28e","#d0c3ec","#ceced0","#bf9d00","#7c64b0","#77787b"];fwk.palettes.PowerQualityEventTypeColors=["#5785af","#b05171","#d5a8bc","#f1e0c2","#c4d6e4","#333333"];fwk.palettes.PowerSeriesColors=["#0087CD","#9FA0A4","#434343"];fwk.palettes.QuantitySeriesColor_Frequency=["#C06EAB"];fwk.palettes.ThemeCustom=["#b14237","#a75726","#757722","#4d8428","#48844b","#488078","#4b7c99","#4a76c2","#7267c6","#a547a5","#b0447b","#73767d"];fwk.palettes.ThemePalette_089622=["#00961c","#3dcd58","#007816","#3dcd58","#008518","#00a81f","#089622"];fwk.palettes.TrendAlertColors=["#ffb3b0","#fce1d0","#fefeca","#dfecf5","#b9ccda","#e3f2dd","#cce3c9","#9fda9a","#73c772","#44a560","#dfecf6","#c5dff0","#9ac7de","#6eacd3","#458cb6","#fce1d1","#fbbda4","#f29478","#ff6a5b","#e73c32"];fwk.palettes.TrendDataSeries=["#139346","#1e86cd","#9068cb","#cd4a98","#c55e1b","#18b858","#24a7ff","#b482ff","#fe5cbf","#f67521","#a2e3bb","#a7bbff","#e1cdff","#ffbee6","#fac8a5","#000000","#303030","#616161","#8f8f8f","#bfbfbf"];fwk.palettes.VoltageSeriesColors=["#dc0a0a","#008f00","#0075ff","#b56200","#5e5e5e"];fwk.settings={"DefaultColor":"#089622","DefaultCurrentSeriesColors":"#ff5959,#4cd24f,#8bc2ff,#ffae57,#ababab","DefaultPowerSeriesColors":"#0087CD,#9FA0A4,#434343","DefaultQuantitySeriesColor_Frequency":"#C06EAB","DefaultVoltageSeriesColors":"#dc0a0a,#008f00,#0075ff,#b56200,#5e5e5e","UserEnteredUrlSchemes":"http https"};fwk.teams={};fwk.teams.isTeamModeEnabled=true;fwk.teams.globalTeamId='410ba100-fe0a-42dc-920a-db345317bb44';fwk.teams.unassignedTeamId='a55162ed-fbda-4737-950c-23d3057a6db3';fwk.teams.teamList={"64e28d11-dddf-4c40-9b15-9c0bccc287ce":"1 - INDUSTRY","7e63b23f-1992-4638-831b-45e041387d0f":"2 - BUILDINGS","233c9677-53cf-4256-9314-7089b5afd287":"3 - HEALTHCARE","729082f4-acf6-4a93-bbb8-84b6f4d5f943":"4 - UTILITY","a3253512-a921-4e92-a11d-87660e309139":"5 - AIRPORT"};fwk.user.teamList=[{"Id":"64e28d11-dddf-4c40-9b15-9c0bccc287ce","Name":"1 - INDUSTRY","TeamMembers":null,"TeamSources":null},{"Id":"7e63b23f-1992-4638-831b-45e041387d0f","Name":"2 - BUILDINGS","TeamMembers":null,"TeamSources":null},{"Id":"233c9677-53cf-4256-9314-7089b5afd287","Name":"3 - HEALTHCARE","TeamMembers":null,"TeamSources":null},{"Id":"729082f4-acf6-4a93-bbb8-84b6f4d5f943","Name":"4 - UTILITY","TeamMembers":null,"TeamSources":null},{"Id":"a3253512-a921-4e92-a11d-87660e309139","Name":"5 - AIRPORT","TeamMembers":null,"TeamSources":null},];fwk.user.identity='internal:database:27ed24fa-6f22-40c3-8ce0-246e8be6d2ce:demo';fwk.user.name='demo';fwk.user.fullyQualifiedName='demo';fwk.user.privileges=["WebReach.AccessApplication","SlideShow.Browse","AlarmViewer.Own","AlarmViewer.ViewIncidents","Security.CanUseMultiuseToken","AlarmViewer.AccessApplication","Dashboard.AccessApplication","Diagrams.AccessApplication","RealtimeTrend.AccessApplication","Saved_Reports.AccessApplication","WebReporter.AccessApplication"];fwk.antiForgeryToken='S9LzFAsWLXz2nnjWKdR5dxeJv6eC4zeC6l42S2dQubheNa7KK1lk5yB2nfQzycxSaOj-TC8WaGc0v5F0nzAsWCo4YQgnNOd9mJdXk3we9Kc1:U1DyqlQHoQBQeOaZfzWJiPpZE-d6enFOjG1HhKae8j8Ts88j5nDPQQ9YBqF4uPkjxWE4h4rwtgTVLHg8ckRnj1OBDbSZA9fff4MoYk1y7q6mfnA3Dg3c_4xiaEYuheSqOSJpo_mbwCTS29bx2yoBHMYoYBSyTwCGYd10QTozHP4o8vThlmvWmqkHT3oZM-PR0';})(window.fwk = window.fwk || {});
    //==== Client Framework Application Settings ====
    
            // Add required i18n localization sets
            i18n.loc.add(["WebReach"]);;
            $(document).ready(function () {
    
                fwk.AddInitializeMethod(function () {
                    fwk.InitializeMethodComplete();
                });
    
                // Custom init complete method
                var InitializationComplete = new Core.CallBackSuccess(function (status) {
                    if (status.success) {
    
                        // information related to the currently selected device
                        WebReach.DiagramManager.DeviceTimezoneName = 'America/Los_Angeles';
    
                        // framework loaded
                        WebReach.DiagramManager.OnLoad();
                    }
                });
    
                // Add required i18n localization sets
                i18n.loc.add(["WebReach"]);;
    
                fwk.Initialize({
                    applicationName: 'WebReach - Diagram',
                    applicationConfigSettingKeys: ['WebReach Settings'], 
                    disableLoadingSplashScreen: true,
                    initializationComplete: InitializationComplete,
                    
                });
            });
    
            function ShowApplication() {
                try {
                    WebReach.DiagramManager.ShowApplication();
                } catch (e) {
                    // nothing
                }
            }
    
            function HideApplication() {
                try {
                    WebReach.DiagramManager.HideApplication();
                } catch (e) {
                    // nothing
                }
            }   
        </script>
    
     </head>
     <body onbeforeunload="HideApplication()" style="background-color:#ffffff; font-family:Arial; font-weight:400; font-size:13px; color:#000000">
      <table style="overflow:hidden; position:absolute; background-color:#f2f2f2; left:9px; top:93px; width:980px; height:469px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center"></td>
        </tr>
      </tbody></table>
      <img border="none" src="ImageConversion/GetImage.aspx?name=x-pml%3a%2fdiagrams%2fimages%2fBackgrounds%2fReal-time_3-line.wmf&amp;width=732&amp;height=355" style="position:absolute; border-collapse:collapse; width:732px; height:355px; left:38px; top:135px">
      <table style="overflow:hidden; position:absolute; left:64px; top:107px; width:124px; height:23px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center">Volts ll</td>
        </tr>
      </tbody></table>
      <a href="default.aspx?dgm=x-pml%3a%2fdiagrams%2fud%2fdefault%2f7400_FAC-PQ-4WYE_V2.0.0%2f7400_FAC-PQ-4WYE_V2.0.0-MinMax.dgm&amp;node=Generation.MV2&amp;logServerName=QUERYSERVER.WIN-56LU4748JDO&amp;logServerHandle=327952&amp;HideBackToNetwork=1">
        <img border="none" src="ImageConversion/GetImage.aspx?name=x-pml%3a%2fdiagrams%2fimages%2ficons%2fMinMax.bmp" style="position:absolute; border-collapse:collapse; width:32px; height:32px; left:895px; top:499px">
      </a>
      <div style="position:absolute; text-align:center; left:813px; top:531px; width:196px; height:17px">Long-term min/max</div>
      <table style="overflow:hidden; position:absolute; left:578px; top:489px; width:144px; height:18px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center">Volts ln</td>
        </tr>
      </tbody></table>
      <table style="overflow:hidden; position:absolute; background-color:#ffffff; left:270px; top:730px; width:988px; height:1px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center"></td>
        </tr>
      </tbody></table>
      <table style="overflow:hidden; position:absolute; background-color:#f2f2f2; left:9px; top:70px; width:147px; height:23px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center">Volts/Amps</td>
        </tr>
      </tbody></table>
      <table style="overflow:hidden; position:absolute; background-color:#c0c0c0; left:157px; top:70px; width:147px; height:23px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center">Power Quality</td>
        </tr>
      </tbody></table>
      <table style="overflow:hidden; position:absolute; background-color:#c0c0c0; left:305px; top:70px; width:147px; height:23px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center">Energy &amp; Dmd</td>
        </tr>
      </tbody></table>
      <table style="overflow:hidden; position:absolute; background-color:#c0c0c0; left:453px; top:70px; width:147px; height:23px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center">Inputs/Outputs</td>
        </tr>
      </tbody></table>
      <table style="overflow:hidden; position:absolute; background-color:#c0c0c0; left:601px; top:70px; width:147px; height:23px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center">Setpoints</td>
        </tr>
      </tbody></table>
      <table style="overflow:hidden; position:absolute; background-color:#c0c0c0; left:749px; top:70px; width:147px; height:23px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center">Setup/Diagnostic</td>
        </tr>
      </tbody></table>
      <a href="default.aspx?dgm=x-pml%3a%2fdiagrams%2fud%2fdefault%2f7400_FAC-PQ-4WYE_V2.0.0%2f7400_FAC-PQ-4WYE_V2.0.0-pq.dgm&amp;node=Generation.MV2&amp;logServerName=QUERYSERVER.WIN-56LU4748JDO&amp;logServerHandle=327952&amp;HideBackToNetwork=1">
        <img border="none" src="/ion/images/transparent.png" style="position:absolute; border-collapse:collapse; width:145px; height:22px; left:158px; top:70px">
      </a>
      <a href="default.aspx?dgm=x-pml%3a%2fdiagrams%2fud%2fdefault%2f7400_FAC-PQ-4WYE_V2.0.0%2f7400_FAC-PQ-4WYE_V2.0.0-rev.dgm&amp;node=Generation.MV2&amp;logServerName=QUERYSERVER.WIN-56LU4748JDO&amp;logServerHandle=327952&amp;HideBackToNetwork=1">
        <img border="none" src="/ion/images/transparent.png" style="position:absolute; border-collapse:collapse; width:145px; height:22px; left:306px; top:71px">
      </a>
      <a href="default.aspx?dgm=x-pml%3a%2fdiagrams%2fud%2fdefault%2f7400_FAC-PQ-4WYE_V2.0.0%2f7400_FAC-PQ-4WYE_V2.0.0-io.dgm&amp;node=Generation.MV2&amp;logServerName=QUERYSERVER.WIN-56LU4748JDO&amp;logServerHandle=327952&amp;HideBackToNetwork=1">
        <img border="none" src="/ion/images/transparent.png" style="position:absolute; border-collapse:collapse; width:145px; height:22px; left:454px; top:69px">
      </a>
      <a href="default.aspx?dgm=x-pml%3a%2fdiagrams%2fud%2fdefault%2f7400_FAC-PQ-4WYE_V2.0.0%2f7400_FAC-PQ-4WYE_V2.0.0-sp.dgm&amp;node=Generation.MV2&amp;logServerName=QUERYSERVER.WIN-56LU4748JDO&amp;logServerHandle=327952&amp;HideBackToNetwork=1">
        <img border="none" src="/ion/images/transparent.png" style="position:absolute; border-collapse:collapse; width:145px; height:22px; left:602px; top:69px">
      </a>
      <a href="default.aspx?dgm=x-pml%3a%2fdiagrams%2fud%2fdefault%2f7400_FAC-PQ-4WYE_V2.0.0%2f7400_FAC-PQ-4WYE_V2.0.0-setup.dgm&amp;node=Generation.MV2&amp;logServerName=QUERYSERVER.WIN-56LU4748JDO&amp;logServerHandle=327952&amp;HideBackToNetwork=1">
        <img border="none" src="/ion/images/transparent.png" style="position:absolute; border-collapse:collapse; width:145px; height:22px; left:751px; top:69px">
      </a>
      <table style="overflow:hidden; position:absolute; left:232px; top:107px; width:97px; height:23px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center">Current</td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:500px; top:386px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22528'][dt='0'][r='0'][un='V%20an']/v">2,083</span>
            <span>V an</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:231px; top:298px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22536'][dt='0'][r='0'][un='A%20a']/v">8,943</span>
            <span>A a</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:231px; top:213px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22537'][dt='0'][r='0'][un='A%20b']/v">9,056</span>
            <span>A b</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:231px; top:128px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22538'][dt='0'][r='0'][un='A%20c']/v">9,058</span>
            <span>A c</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:704px; top:386px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22530'][dt='0'][r='0'][un='V%20cn']/v">2,057</span>
            <span>V cn</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:602px; top:386px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22529'][dt='0'][r='0'][un='V%20bn']/v">2,057</span>
            <span>V bn</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:20px; top:211px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22534'][dt='0'][r='0'][un='V%20ca']/v">3,558</span>
            <span>V ca</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:121px; top:253px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22532'][dt='0'][r='0'][un='V%20ab']/v">3,604</span>
            <span>V ab</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:121px; top:168px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22533'][dt='0'][r='0'][un='V%20bc']/v">3,559</span>
            <span>V bc</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:91px; top:400px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22564'][dt='0'][r='1'][un='']/v">0.9</span>
          </td>
        </tr>
      </tbody></table>
      <div style="position:absolute; text-align:center; left:89px; top:383px; width:104px; height:17px">% V unbal</div>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:91px; top:450px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22535'][dt='0'][r='0'][un='V']/v">3,574</span>
            <span>V</span>
          </td>
        </tr>
      </tbody></table>
      <div style="position:absolute; text-align:center; left:77px; top:433px; width:127px; height:17px">Vll average</div>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:843px; top:386px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22531'][dt='0'][r='0'][un='V']/v">2,066</span>
            <span>V</span>
          </td>
        </tr>
      </tbody></table>
      <div style="position:absolute; text-align:center; left:829px; top:369px; width:127px; height:17px">Vln average</div>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:231px; top:400px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22539'][dt='0'][r='0'][un='A']/v">9,019</span>
            <span>A</span>
          </td>
        </tr>
      </tbody></table>
      <div style="position:absolute; text-align:center; left:229px; top:383px; width:104px; height:17px">I average</div>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:842px; top:137px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22567'][dt='0'][r='2'][un='Hz']/v">60.18</span>
            <span>Hz</span>
          </td>
        </tr>
      </tbody></table>
      <div style="position:absolute; text-align:center; left:840px; top:120px; width:104px; height:17px">Frequency</div>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:842px; top:210px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22555'][dt='0'][r='1'][un='%25']/v">88.3</span>
            <span>%</span>
          </td>
        </tr>
      </tbody></table>
      <div style="position:absolute; text-align:center; left:823px; top:193px; width:138px; height:17px">Power Factor</div>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:361px; top:349px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22543'][dt='0'][r='0'][un='kW']/v">49,331</span>
            <span>kW</span>
          </td>
        </tr>
      </tbody></table>
      <div style="position:absolute; text-align:center; left:361px; top:332px; width:100px; height:17px">kW total</div>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:361px; top:400px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22547'][dt='0'][r='0'][un='kVAR']/v">26,271</span>
            <span>kVAR</span>
          </td>
        </tr>
      </tbody></table>
      <div style="position:absolute; text-align:center; left:353px; top:383px; width:115px; height:17px">kVAR total</div>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:361px; top:450px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22551'][dt='0'][r='0'][un='kVA']/v">55,890</span>
            <span>kVA</span>
          </td>
        </tr>
      </tbody></table>
      <div style="position:absolute; text-align:center; left:359px; top:433px; width:104px; height:17px">kVA total</div>
      <a href="default.aspx?dgm=x-pml%3a%2fdiagrams%2fud%2fdefault%2f7400_FAC-PQ-4WYE_V2.0.0%2f7400_FAC-PQ-4WYE_V2.0.0-logs.dgm&amp;node=Generation.MV2&amp;logServerName=QUERYSERVER.WIN-56LU4748JDO&amp;logServerHandle=327952&amp;HideBackToNetwork=1">
        <img border="none" src="ImageConversion/GetImage.aspx?name=x-pml%3a%2fdiagrams%2fimages%2fIcons%2fLogs.bmp" style="position:absolute; border-collapse:collapse; width:32px; height:32px; left:793px; top:499px">
      </a>
      <div style="position:absolute; text-align:center; left:786px; top:531px; width:46px; height:17px">Logs</div>
      <table style="overflow:hidden; position:absolute; left:9px; top:24px; width:723px; height:22px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:left; font-family:Verdana; font-weight:400; font-size:12px; color:#000000">UTIL_Generation.Solar</td>
        </tr>
      </tbody></table>
      <table style="overflow:hidden; position:absolute; left:362px; top:107px; width:97px; height:23px" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td style="vertical-align:text-top; padding:0px; text-align:center">Power</td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:361px; top:298px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22540'][dt='0'][r='0'][un='kW%20a']/v">16,444</span>
            <span>kW a</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:361px; top:213px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22541'][dt='0'][r='0'][un='kW%20b']/v">16,444</span>
            <span>kW b</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:center; background-color:#ffffff; border-style:solid; border-color:#9fa0a4; border-width:1px; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:361px; top:128px; width:100px; height:30px" title="">
        <tbody style="background-color: rgb(255, 255, 255);"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span defaultcolor="#ffffff" supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='22542'][dt='0'][r='0'][un='kW%20c']/v">16,444</span>
            <span>kW c</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:left; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:333px; top:562px; width:378px; height:30px" title="">
        <tbody style="background-color: transparent;"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span>Device Time</span>
            <span>:</span>
            <span supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='23421'][dt='8'][r='1'][un='']/v" title="8/29/2022 3:21:09.563 AM Pacific Daylight Time">8/29/2022 3:21:09.563 AM</span>
          </td>
        </tr>
      </tbody></table>
      <table style="border-collapse:collapse; position:absolute; text-align:left; font-family:Arial; font-weight:400; font-size:13px; color:#000000; left:333px; top:591px; width:377px; height:30px" title="">
        <tbody style="background-color: transparent;"><tr valign="middle">
          <td style="padding:0px; white-space:nowrap">
            <span>Device Type</span>
            <span>:</span>
            <span supplemental="NumericItem" xpath="Items[nodeName='Generation.MV2']/Item[h='4864'][dt='0'][r='0'][un='']/v">7400</span>
          </td>
        </tr>
      </tbody></table>
      <img border="none" src="ImageConversion/GetImage.aspx?name=x-pml%3a%2fDIAGRAMS%2fIMAGES%2ficons%2fCompany_logo.bmp" style="position:absolute; border-collapse:collapse; width:151px; height:44px; left:16px; top:568px">
      <script type="text/javascript">$(document).ready(function() {
        WebReach.DiagramManager.PollingTimeIntervalMs=3000;
        WebReach.DiagramManager.StalePeriodSeconds=60;
        WebReach.DiagramManager.UpdatePeriodSeconds=5;
        WebReach.DiagramManager.UICultureName='en';
        WebReach.DiagramManager.CultureName='en-US';
        WebReach.DiagramManager.PollingSubscriptionKey='x-pml:/diagrams/ud/default/7400_fac-pq-4wye_v2.0.0/7400_fac-pq-4wye_v2.0.0.dgm,l=en,r=en-us@generation.mv2';
        WebReach.DiagramManager.m_HiHiFlagColor='#ff0000';
        WebReach.DiagramManager.m_HighFlagColor='#ff8000';
        WebReach.DiagramManager.m_LowFlagColor='#00b8ff';
        WebReach.DiagramManager.m_LoLoFlagColor='#6060ff';
        WebReach.DiagramManager.m_StaleFlagColor='#ffff00';
        WebReach.DiagramManager.m_ErrorFlagColor='#ff8000';});</script>
    
    
    <div id="templates" style="display:none;"></div></body></html>
      </div>
   