<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<!-- ============================================================
     404 / ERROR PAGE — Premium Dark Theme
     $status and $message PHP variables are preserved exactly
     ============================================================ -->
<section style="
    min-height: calc(100vh - 72px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4rem 1.5rem;
    background-color: var(--color-page-bg);
    position: relative;
    overflow: hidden;
">

    <!-- Ambient glow blobs (purely decorative, CSS only) -->
    <div style="
        position:absolute; top:-120px; left:50%;
        transform:translateX(-50%);
        width:600px; height:600px;
        background: radial-gradient(ellipse at center, rgba(99,102,241,0.10) 0%, transparent 70%);
        pointer-events:none; z-index:0;
    "></div>
    <div style="
        position:absolute; bottom:-80px; right:10%;
        width:360px; height:360px;
        background: radial-gradient(ellipse at center, rgba(129,140,248,0.07) 0%, transparent 70%);
        pointer-events:none; z-index:0;
    "></div>

    <!-- Card -->
    <div style="
        position:relative; z-index:1;
        background: #1E293B;
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 20px;
        padding: 4rem 3rem;
        max-width: 560px;
        width: 100%;
        text-align: center;
        box-shadow: 0 24px 80px rgba(0,0,0,0.50);
    ">

        <!-- Status Code -->
        <div style="
            font-size: 5.5rem;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -0.04em;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #818CF8 0%, #6366F1 50%, #4F46E5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-family: 'Inter', sans-serif;
        "><?= $status ?></div>

        <!-- Divider line -->
        <div style="
            width: 48px; height: 3px;
            background: linear-gradient(90deg, #6366F1, #818CF8);
            border-radius: 9999px;
            margin: 1rem auto 1.5rem;
        "></div>

        <!-- Message -->
        <p style="
            font-size: 1.05rem;
            line-height: 1.7;
            color: #94A3B8;
            margin-bottom: 2.25rem;
            font-family: 'Open Sans', sans-serif;
        "><?= $message ?></p>

        <!-- Action Buttons -->
        <div style="display:flex; gap:0.75rem; justify-content:center; flex-wrap:wrap;">

            <!-- Primary: Go to Listings -->
            <a href="/listings"
               style="
                   display:inline-flex; align-items:center; gap:0.5rem;
                   padding: 0.65rem 1.5rem;
                   background: #6366F1;
                   color: #ffffff !important;
                   font-size: 0.875rem;
                   font-weight: 600;
                   border-radius: 8px;
                   text-decoration: none;
                   box-shadow: 0 4px 14px rgba(99,102,241,0.35);
                   transition: all 0.2s ease;
               "
               onmouseover="this.style.backgroundColor='#4F46E5'; this.style.boxShadow='0 6px 20px rgba(99,102,241,0.50)';"
               onmouseout="this.style.backgroundColor='#6366F1'; this.style.boxShadow='0 4px 14px rgba(99,102,241,0.35)';">
                <i class="fa-solid fa-briefcase" style="font-size:0.8rem;"></i>
                Browse Jobs
            </a>

            <!-- Secondary: Go Home -->
            <a href="/"
               style="
                   display:inline-flex; align-items:center; gap:0.5rem;
                   padding: 0.65rem 1.5rem;
                   background: transparent;
                   color: #94A3B8 !important;
                   font-size: 0.875rem;
                   font-weight: 600;
                   border-radius: 8px;
                   text-decoration: none;
                   border: 1px solid rgba(255,255,255,0.10);
                   transition: all 0.2s ease;
               "
               onmouseover="this.style.borderColor='rgba(99,102,241,0.50)'; this.style.color='#F8FAFC';"
               onmouseout="this.style.borderColor='rgba(255,255,255,0.10)'; this.style.color='#94A3B8';">
                <i class="fa-solid fa-house" style="font-size:0.8rem;"></i>
                Go Home
            </a>

        </div>

        <!-- Hint text -->
        <p style="margin-top:2rem; font-size:0.75rem; color:#334155;">
            <i class="fa-solid fa-circle-info" style="margin-right:0.3rem; color:#475569;"></i>
            If you believe this is a mistake, please check the URL and try again.
        </p>

    </div><!-- /card -->
</section>

<?php loadPartial('footer'); ?>
