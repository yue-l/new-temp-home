<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

// randomiz color
// function rand_color() {
//     return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
// }

$this->title = 'Yue Li - passionate about software';
?>

<!-- Header -->
<div id="top" class="header">
    <div class="text-vertical-top">
        <h1 class="text-heading-color" ><span class="bounce-in">Hello,</span></h1>
        <h1 class="text-heading-color" ><span class="bounce-in-later">I'm Yue Li</span></h1>
        <p class="text-body-color" id="movingtext">
            <span id="slow-input-content" style="color:white; pading-right:70px"></span><span class="blink-cursor" style="color:white;">|</span>
        </p>
        <div class="recent-display-area" style="color:white;">
            <div class="unorder-list">
                <div class="unorder-list-item">
                    <a href="#">
                        <h2>Job Hunting</h2>
                        <p>I'm looking for PHP/Full Stack Developer role.</p>
                    </a>
                </div>
                <div class="unorder-list-item">
                    <a href="#">
                        <h2>Ice Hockey</h2>
                        <p>Train hard for summer season games.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-vertical-bottom">
        <a href="#abouttag" id="learnBtn" class="btn btn-dark btn-lg">More About Yue</a>
    </div>
</div>
<div id="abouttag">
    <div id="aboutme" class="about">
        <div class="container">
            <div class="row">
                <h2>What About Yue?</h2>
                <div class="col-lg-6 text-left">
                    <div>
                        <img src="<?= Url::base(); ?>/img/yue.jpeg" class="img-responsive"/>
                    </div>
                    <br/>
                    <br/>
                    <p class="lead">
                        I am an all-rounder technologist. My professional practice covers the entire SDLC. I'm upfront to challenges, and I care about to make things right. I'm driven by delivering robust software solutions to boost business success.
                    </p>
                </div>
                <div class="col-lg-6 text-left">
                    <p class="lead">
                        Key Attributes:
                        <ul>
                            <li class="lead">Outcome-oriented</li>
                            <li class="lead">Open-minded and Passionate</li>
                        </ul>
                    </p>
                    <p class="lead">
                        Technical Strengths:
                        <ul>
                            <li class="lead">LAMP stack in both application and infrastructure level</li>
                            <li class="lead">Front-end: Bootstrap, JQuery, SCSS</li>
                            <li class="lead">Back-end: Yii, Codeigniter, Laravel, Node.JS, Twisted</li>
                            <li class="lead">Databases: MariaDB, MySQL, PostgreSQL</li>
                            <li class="lead">Strong analytic programming skills</li>
                            <li class="lead">Git Version Control</li>
                        </ul>
                    </p>
                </div>
            </div>
            <div style="text-align: center;">
                <a href="#historytag" id="employmentBtn" class="btn btn-dark btn-lg">My Career</a>
            </div>
        </div>
    </div>
</div>

<!-- timeline -->
<div id="historytag">
    <ol class="rounded-list ordertimeitem">
        <li><span>Jul 2017 - Sept 2018, Mutual Benefit Ltd, Software Developer</span></li>
        <li><span>Jan 2018 - Jun 2018, Wine-Searcher Ltd, PHP Developer / Consultant</span></li>
        <li><span>Mar 2016 - Oct 2017, James Law Realty Ltd, Software Developer</span></li>
        <li><span>Aug 2015 - Jan 2016, James Law Realty Ltd, Junior Developer</span></li>
        <li><span>Jul 2014 - Aug 2015, UpStage, Software Developer / QA</span></li>
        <li><span>Feb 2014 - Aug 2015, AUT IT Client Services, IT Support</span></li>
    </ol>
</div>

<!-- footer -->
<div class="footer">
    <div id="contactMe" class="col-lg-12 text-center">
        <h4><strong>Yue Li</strong></h4>
        <ul class="list-unstyled">
            <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:yue.li.akl@gmail.com">Contact Me</a></li>
        </ul>
        <br>
        <ul class="list-inline">
            <li>
                <a class="btn btn-social-icon btn-linkedin" href="https://nz.linkedin.com/pub/yue-li/86/494/50" target="_blank">
                    <i class="fab fa-linkedin-in fa-3x"></i>
                </a>
            </li>
            <li>
                <a class="btn btn-social-icon btn-github" href="https://github.com/yue-l" target="_blank">
                    <i class="fab fa-github fa-3x"></i>
                </a>
            </li>
        </ul>
        <hr class="small">
        <p class="text-muted">Copyright &copy; <a href="http://yueli.nz">Yue Li</a></p>
    </div>
</div>
