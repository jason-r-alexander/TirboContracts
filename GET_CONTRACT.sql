SELECT
    C.C_ID,
    (CASE 
        C.L_ID 
        WHEN C.L_ID 
        THEN CONCAT(L.L_NAME,', ',L.L_ADDRESS,' ---- Phone: ',L.L_PHONE) 
     END) LOCATION,
    /* ---------------------------------------------------------------*/
    -- This code doesn't work
    -- T_HOME overides T_AWAY or vise versa
    -- Displaying 'UNI_NAME' might work in PHP
    /*(CASE
        C.R_ID
        WHEN C.R_ID
        THEN R.R_NAME
    END) REFREE,
    (CASE 
        T_HOME
        WHEN T_HOME
        THEN UNI_NAME
    END) HOME_TEAM,
    (CASE 
        T_AWAY
        WHEN T_AWAY
        THEN UNI_NAME
    END) AWAY_TEAM,*/
    /* ---------------------------------------------------------------*/
    T_HOME,
    T_AWAY,
    C_SPORT, 
    C_SITE, 
    C_START_TIME, 
    C_END_TIME, 
    C_DATE, 
    C_RULES, 
    C_COMMENTS, 
    C_AD_H, 
    C_SIGNED_H, 
    C_SIGNED_H_DATE, 
    C_AD_A, 
    C_SIGNED_A, 
    C_SIGNED_A_DATE 
FROM Contract C, Team_Contract TC, Location L, University U, Athletic_Director AD , Referee R
WHERE C.C_ID = TC.C_ID
    AND C.L_ID = L.L_ID
    AND L.UNI_ID = U.UNI_ID
    AND U.AD_ID = AD.AD_ID
    AND C.R_ID = R.R_ID
    -- AND Team_Contract.T_HOME = University.UNI_ID
    -- AND Team_Contract.T_AWAY = University.UNI_ID
    -- AND Contract.C_ID = 131 -- THIS WILL BE THE GET ROW