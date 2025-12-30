// Header.js (React Component)
import React from 'react';

function Header() {
    return (
        <header className="header">
            <div className="logo">
                <img src="path/to/logo.png" alt="LifeLine Connect Logo" />
                <span>LifeLine Connect</span>
            </div>
            <nav className="nav-links">
                <a href="/dashboard">Dashboard</a>
                <a href="/donors">Donors</a>
                <a href="/camps">Camps</a>
                <a href="/admin">Admin</a>
            </nav>
        </header>
    );
}

export default Header;
