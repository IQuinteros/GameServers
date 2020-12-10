// Buttons

import * as buttons from "./buttons.js";

window.onHomeClicked = buttons.goToHome;
window.onRegisterClicked = buttons.goToRegister;
window.onFeatureMultiplayerClicked = buttons.goToFeatureMultiplayer;
window.onFeatureAnalyticsClicked = buttons.goToFeatureAnalytics;
window.onFeatureLiveOpsClicked = buttons.goToFeatureLiveOps;
window.onPricingClicked = buttons.goToPricing;
window.onDocsClicked = buttons.goToDocs;
window.toggleMobileNav = buttons.toggleMobileNav;
window.toggleFeaturesNav = buttons.toggleFeaturesNav;
window.onProfileClicked = buttons.goToProfile;
window.closeSession = buttons.closeSession;
window.onProjectClicked = buttons.goToProject;
window.onProjectEconomyClicked = buttons.goToProjectEconomy;

// Footer

import * as footer from "./footer.js";

window.onContactSent = footer.sendContactMessage;

// Docs

import * as docs from "./docs_feedback.js";

window.rateDoc = docs.rateDoc;
window.toggleAsideDoc = docs.toggleAsideDoc;

// Register

import * as profile from "./profile.js";

window.onRegisterSubmit = profile.onRegisterSubmit;
window.onLoginSubmit = profile.onLoginSubmit;
window.onProfileSubmit = profile.onProfileSubmit;
window.deleteAccount = profile.deleteAccount;

// Project

import * as project from "./project.js";

window.onNewProjectSubmit = project.onNewProjectSubmit;
window.onProjectSubmit = project.onProjectSubmit;

// PopUp

import * as popup from './popup.js';

window.closePopUp = popup.closePopUp;
window.openPopUp = popup.openPopUp;