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
window.onProjectExperimentsClicked = buttons.goToProjectExperiments;
window.onAdminClicked = buttons.goToAdmin;
window.goToAdminPricing = buttons.goToAdminPricing;
window.goToAdminClients = buttons.goToAdminClients;
window.goToAdminPlans = buttons.goToAdminPlans;

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

// Economy

import * as economy from './economy.js';

window.onEconomySubmit = economy.onEconomySubmit;
window.onDeleteEconomy = economy.onDeleteEconomy;
window.editElement = economy.editElement;
window.onNewEconomy = economy.onNewEconomy;

import * as experiments from './experiments.js';

window.onExperimentSubmit = experiments.onExperimentSubmit;
window.onDeleteExperiment = experiments.onDeleteExperiment;
window.editExperiment = experiments.editExperiment;
window.onNewExperiment = experiments.onNewExperiment;

// Admin

import * as admin from './admin.js';

window.onAdminLoginSubmit = admin.onAdminLoginSubmit;
window.closeAdminSession = admin.closeAdminSession;

// Plans

import * as plans from './plans.js';

window.editPlan = plans.editPlan;
window.onPlanSubmit = plans.onPlanSubmit;

/// Clients

import * as clients from './clients.js';

window.onDeleteClients = clients.onDeleteClients;
window.displayInfo = clients.displayInfo;