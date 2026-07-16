<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ForzaGym — <?= $heading ?? 'Panel de Administración' ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root{
    --ink:#161B22;
    --ink-soft:#232B35;
    --paper:#F1F2EE;
    --card:#FFFFFF;
    --line:#E2E1DA;
    --line-dark:#323B47;
    --text:#1D2126;
    --muted:#6B7280;
    --accent:#D7263D;
    --accent-dark:#B31E32;
    --accent-soft:#FBE4E7;
    --steel:#3A6EA5;
    --steel-soft:#E4ECF5;
    --success:#2E8B57;
    --success-soft:#E1F3E9;
    --warn:#C88A1E;
    --warn-soft:#FBEED9;
    --danger-soft:#FBE4E4;
    --radius:10px;
    --font-display:'Oswald', sans-serif;
    --font-body:'Inter', sans-serif;
  }
  *{box-sizing:border-box;}
  html,body{height:100%;}
  body{margin:0;font-family:var(--font-body);background:var(--paper);color:var(--text);-webkit-font-smoothing:antialiased;}
  h1,h2,h3,.display{font-family:var(--font-display);text-transform:uppercase;letter-spacing:.02em;}
  a{color:inherit;text-decoration:none;}
  button{font-family:inherit;cursor:pointer;}
  :focus-visible{outline:3px solid var(--steel);outline-offset:2px;}

  .lanes{background-image:repeating-linear-gradient(100deg, rgba(255,255,255,.05) 0px, rgba(255,255,255,.05) 2px, transparent 2px, transparent 34px);}

  /* ============ AUTH PAGES ============ */
  .auth-screen{min-height:100vh;display:grid;grid-template-columns:1.1fr 1fr;}
  @media (max-width:860px){.auth-screen{grid-template-columns:1fr;} .login-visual{display:none;}}
  .login-visual{background:var(--ink);color:#fff;position:relative;overflow:hidden;display:flex;flex-direction:column;justify-content:space-between;padding:48px;}
  .login-visual::before{content:"";position:absolute;inset:0;background-image:repeating-linear-gradient(100deg, rgba(215,38,61,.14) 0px, rgba(215,38,61,.14) 3px, transparent 3px, transparent 56px);pointer-events:none;}
  .brand{display:flex;align-items:center;gap:12px;position:relative;z-index:1;}
  .brand-mark{width:38px;height:38px;border-radius:8px;background:var(--accent);display:flex;align-items:center;justify-content:center;font-family:var(--font-display);font-weight:700;font-size:19px;color:#fff;flex:none;}
  .brand-name{font-family:var(--font-display);font-weight:600;font-size:22px;letter-spacing:.03em;}
  .login-quote{position:relative;z-index:1;max-width:420px;}
  .login-quote .num{font-family:var(--font-display);font-size:76px;line-height:1;color:var(--accent);font-weight:700;margin-bottom:6px;}
  .login-quote h1{font-size:26px;margin:0;font-weight:500;text-transform:none;letter-spacing:normal;}
  .login-quote p{font-size:16px;line-height:1.6;color:#C7CCD3;margin:8px 0 0;}
  .login-stats{position:relative;z-index:1;display:flex;gap:28px;padding-top:24px;border-top:1px solid rgba(255,255,255,.14);}
  .login-stats div span{display:block;}
  .login-stats .n{font-family:var(--font-display);font-size:26px;font-weight:600;}
  .login-stats .l{font-size:12px;color:#8B93A0;text-transform:uppercase;letter-spacing:.06em;margin-top:2px;}
  .login-form-wrap{display:flex;align-items:center;justify-content:center;padding:40px 24px;}
  .login-form{width:100%;max-width:380px;}
  .login-form h1{font-size:28px;margin:0 0 6px;color:var(--text);}
  .login-sub{color:var(--muted);font-size:14px;margin:0 0 32px;}
  .field{margin-bottom:16px;}
  .field label{display:block;font-size:12px;font-weight:600;color:var(--text);text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px;}
  .field input, .field select{width:100%;padding:11px 13px;border:1.5px solid var(--line);border-radius:8px;font-size:14px;font-family:var(--font-body);background:#fff;color:var(--text);transition:border-color .15s;}
  .field input:focus, .field select:focus{border-color:var(--accent);outline:none;box-shadow:0 0 0 3px var(--accent-soft);}
  .field .err{color:var(--accent-dark);font-size:12px;margin-top:4px;min-height:14px;}
  .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:12px 18px;border-radius:8px;border:none;font-weight:600;font-size:14px;transition:transform .1s, background .15s, box-shadow .15s;}
  .btn:active{transform:translateY(1px);}
  .btn-primary{background:var(--accent);color:#fff;}
  .btn-primary:hover{background:var(--accent-dark);}
  .btn-ghost{background:transparent;color:var(--text);border:1.5px solid var(--line);}
  .btn-ghost:hover{border-color:var(--ink);}
  .btn-block{width:100%;}
  .btn-sm{padding:7px 12px;font-size:12.5px;border-radius:6px;}
  .login-toggle{text-align:center;margin-top:22px;font-size:13.5px;color:var(--muted);}
  .login-toggle a{color:var(--accent);font-weight:600;}
  .login-note{margin-top:28px;padding:12px 14px;background:var(--steel-soft);border-radius:8px;font-size:12.5px;color:#345676;line-height:1.5;}
  .alert{padding:11px 14px;border-radius:8px;font-size:13px;margin-bottom:18px;}
  .alert-error{background:var(--danger-soft);color:var(--accent-dark);}
  .alert-success{background:var(--success-soft);color:var(--success);}

  /* ============ APP SHELL ============ */
  #app{display:grid;grid-template-columns:236px 1fr;min-height:100vh;}
  @media (max-width:900px){#app{grid-template-columns:1fr;} .sidebar{display:none;}}
  .sidebar{background:var(--ink);color:#fff;display:flex;flex-direction:column;position:relative;}
  .sidebar-top{padding:22px 20px 18px;display:flex;align-items:center;gap:10px;border-bottom:1px solid var(--line-dark);}
  .sidebar-top .brand-name{font-size:18px;}
  .sidebar-top .brand-mark{width:32px;height:32px;font-size:16px;border-radius:7px;}
  nav.sidenav{padding:14px 12px;flex:1;}
  .nav-label{font-size:10.5px;color:#69707D;text-transform:uppercase;letter-spacing:.09em;padding:14px 10px 6px;font-weight:600;}
  .nav-item{display:flex;align-items:center;gap:11px;padding:10px 12px;border-radius:7px;margin-bottom:2px;color:#B7BEC9;font-size:14px;font-weight:500;background:none;border:none;width:100%;text-align:left;}
  .nav-item svg{flex:none;opacity:.85;}
  .nav-item:hover{background:var(--ink-soft);color:#fff;}
  .nav-item.active{background:var(--accent);color:#fff;}
  .nav-item.active svg{opacity:1;}
  .sidebar-foot{padding:16px 20px 20px;border-top:1px solid var(--line-dark);}
  .user-chip{display:flex;align-items:center;gap:10px;margin-bottom:12px;}
  .avatar{width:34px;height:34px;border-radius:50%;background:var(--steel);color:#fff;display:flex;align-items:center;justify-content:center;font-family:var(--font-display);font-weight:600;font-size:14px;flex:none;}
  .user-chip .name{font-size:13.5px;font-weight:600;color:#fff;}
  .user-chip .role{font-size:11.5px;color:#8B93A0;text-transform:capitalize;}
  .logout-btn{display:flex;align-items:center;gap:8px;color:#B7BEC9;background:none;border:none;font-size:13px;padding:0;}
  .logout-btn:hover{color:#fff;}

  .main{overflow-y:auto;}
  .topbar{display:flex;align-items:center;justify-content:space-between;padding:18px 32px;background:var(--card);border-bottom:1px solid var(--line);position:sticky;top:0;z-index:5;}
  .topbar h2{font-size:20px;margin:0;color:var(--text);text-transform:none;font-family:var(--font-body);font-weight:700;}
  .topbar .sub{font-size:13px;color:var(--muted);margin-top:2px;}
  .content{padding:28px 32px 60px;}

  .stat-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:28px;}
  @media (max-width:1000px){.stat-grid{grid-template-columns:repeat(2,1fr);}}
  .stat-card{background:var(--card);border:1px solid var(--line);border-radius:var(--radius);padding:18px 20px;position:relative;overflow:hidden;}
  .stat-card .icon-badge{width:34px;height:34px;border-radius:8px;display:flex;align-items:center;justify-content:center;margin-bottom:14px;}
  .stat-card .val{font-family:var(--font-display);font-size:28px;font-weight:600;line-height:1;}
  .stat-card .lbl{font-size:12.5px;color:var(--muted);margin-top:6px;}
  .stat-card .delta{font-size:11.5px;font-weight:600;margin-top:10px;display:inline-block;}
  .delta.up{color:var(--success);}
  .delta.warn{color:var(--warn);}

  .panel-row{display:grid;grid-template-columns:1.4fr 1fr;gap:18px;margin-bottom:28px;}
  @media (max-width:1000px){.panel-row{grid-template-columns:1fr;}}
  .panel{background:var(--card);border:1px solid var(--line);border-radius:var(--radius);padding:20px 22px;}
  .panel-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
  .panel-head h3{font-size:14.5px;margin:0;color:var(--text);}
  .panel-head .view-all{font-size:12px;color:var(--steel);font-weight:600;background:none;border:none;}
  .sched-row{display:flex;align-items:center;gap:12px;padding:10px 0;border-bottom:1px solid var(--line);}
  .sched-row:last-child{border-bottom:none;}
  .sched-time{font-family:var(--font-display);font-size:13px;color:var(--steel);width:56px;flex:none;}
  .sched-info .cname{font-size:13.5px;font-weight:600;}
  .sched-info .cmeta{font-size:12px;color:var(--muted);margin-top:1px;}

  .section-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;flex-wrap:wrap;gap:12px;}
  .section-head h2{font-size:22px;margin:0;}
  .toolbar{display:flex;gap:10px;align-items:center;flex-wrap:wrap;}

  .table-card{background:var(--card);border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;}
  table{width:100%;border-collapse:collapse;}
  thead th{text-align:left;font-size:11px;text-transform:uppercase;letter-spacing:.06em;color:var(--muted);padding:13px 18px;border-bottom:1px solid var(--line);background:#FAFAF8;font-weight:600;}
  tbody td{padding:13px 18px;border-bottom:1px solid var(--line);font-size:13.5px;vertical-align:middle;}
  tbody tr:last-child td{border-bottom:none;}
  tbody tr:hover{background:#FAFAF8;}
  .cell-name{font-weight:600;}
  .cell-sub{color:var(--muted);font-size:12px;margin-top:1px;}

  .badge{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:20px;font-size:11.5px;font-weight:600;text-transform:uppercase;letter-spacing:.03em;}
  .badge::before{content:"";width:6px;height:6px;border-radius:50%;background:currentColor;}
  .badge.active{background:var(--success-soft);color:var(--success);}
  .badge.expired{background:var(--danger-soft);color:var(--accent-dark);}
  .badge.suspended{background:var(--warn-soft);color:var(--warn);}
  .badge.present{background:var(--success-soft);color:var(--success);}
  .badge.late{background:var(--warn-soft);color:var(--warn);}
  .badge.absent{background:var(--danger-soft);color:var(--accent-dark);}

  .row-actions{display:flex;gap:6px;justify-content:flex-end;}
  .icon-btn{width:30px;height:30px;border-radius:6px;border:1px solid var(--line);background:#fff;display:inline-flex;align-items:center;justify-content:center;color:var(--muted);}
  .icon-btn:hover{border-color:var(--ink);color:var(--ink);}
  .icon-btn.danger:hover{border-color:var(--accent);color:var(--accent);}
  .delete-form{display:inline;}

  .empty-state{padding:56px 20px;text-align:center;color:var(--muted);}
  .empty-state p{font-size:13.5px;margin:4px 0 0;}

  .class-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:16px;}
  .class-card{background:var(--card);border:1px solid var(--line);border-radius:var(--radius);padding:18px 20px;}
  .class-card .top-row{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:14px;}
  .class-card h4{margin:0 0 4px;font-size:15px;font-family:var(--font-body);font-weight:700;text-transform:none;letter-spacing:normal;}
  .class-card .trainer{font-size:12.5px;color:var(--muted);}
  .class-card .price{font-family:var(--font-display);color:var(--accent);font-size:16px;}
  .class-card .meta-row{display:flex;justify-content:space-between;align-items:center;margin-top:14px;padding-top:14px;border-top:1px dashed var(--line);}
  .class-card .gym{font-size:12px;color:var(--muted);}
  .ring-wrap{display:flex;align-items:center;gap:8px;}
  .ring-wrap .ring-label{font-size:11px;color:var(--muted);}

  .form-card{background:var(--card);border:1px solid var(--line);border-radius:var(--radius);padding:28px 30px;max-width:640px;}
  .form-grid{display:grid;grid-template-columns:1fr 1fr;gap:0 20px;}
  .form-grid .field.full{grid-column:1 / -1;}
  .form-actions{display:flex;gap:10px;margin-top:8px;justify-content:flex-end;}
  .back-link{font-size:13.5px;color:var(--muted);display:inline-flex;align-items:center;gap:6px;margin-bottom:16px;}
  .back-link:hover{color:var(--text);}

  .detail-card{background:var(--card);border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;max-width:640px;}
  .detail-row{display:grid;grid-template-columns:1fr 2fr;gap:12px;padding:14px 20px;border-bottom:1px solid var(--line);}
  .detail-row:last-child{border-bottom:none;}
  .detail-row dt{font-size:12.5px;color:var(--muted);font-weight:600;}
  .detail-row dd{margin:0;font-size:13.5px;}

  .toast{position:fixed;bottom:24px;left:50%;transform:translateX(-50%) translateY(20px);background:var(--ink);color:#fff;padding:12px 20px;border-radius:8px;font-size:13.5px;opacity:0;pointer-events:none;transition:all .25s;z-index:60;display:flex;align-items:center;gap:8px;}
  .toast.show{opacity:1;transform:translateX(-50%) translateY(0);}
  .toast .dot{width:7px;height:7px;border-radius:50%;background:var(--success);flex:none;}

  ::-webkit-scrollbar{width:10px;height:10px;}
  ::-webkit-scrollbar-thumb{background:#D5D3CA;border-radius:8px;}
</style>
</head>
<body>
