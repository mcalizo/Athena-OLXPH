@categorylink
Feature: Verify category links
Story: As a user, I want to access specific categories in homepage and in ad listing page, So that I can start browsing in specific ad categories

  @parallel-scenario @cat10
  Scenario Outline: Verify that I should be able to navigate to the corresponding category selected
    Given I am in HomePage
    When I click <categoryName> category in homepage
    Then I should be redirected to results page
    And The URL link in listing page should has <categoryLink>

  Examples:
  | categoryName                        | categoryLink                                 |
  | Mobile Phones and Tablets           | /mobile-phones-tablets                       |
  | Computers                           | /computers                                   |
  | Consumer Electronics                | /consumer-electronics                        |
  | Pets and Animals                    | /pets-animals                                |
  | Home and Furniture                  | /home-furniture                              |
  | Beauty, Health, and Grocery         | /beauty-health-grocery                       |
  | Clothing and Accessories            | /clothing-accessories                        |
  | Books, Sports and Hobbies           | /books-sports-hobbies                        |
  | Baby Stuff and Toys                 | /baby-stuff-toys                             |
  | Real Estate                         | /real-estate                                 |
  | Cars and Automotives                | /cars-automotives                            |
  | Services                            | /services                                    |
  | Jobs                                | /jobs                                        |
  | Business and Earning Opportunities  | /business-and-earning-opportunities          |
  | Motorcycles and Scooters            | /motorcycles                                 |
  | Construction and Farming            | /construction-farming                        |
  | Heavy Machinery and Trucks          | /heavy-machinery-trucks                      |

  @parallel-scenario @cat1
  Scenario Outline: Verify that I should be able to navigate to the corresponding category and single sub category selected
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I click Choose other category link
    Then I should see a modal that contains categories
    And I click category <categoryName> in Modal
    And I click subcategory <subCategory> in Modal page
    And The URL link in listing page should has <categoryLink>

  Examples:
  | categoryName                        | subCategory                                                 | categoryLink                                            |
  | Mobile Phones and Tablets           | Mobile Phones and Smartphones                               | /mobile-phones-tablets/mobile-phones-smartphones        |
  | Mobile Phones and Tablets           | Accessories for Mobile Phones and Tablets                   | /mobile-phones-tablets/mobile-phones-accessories        |
  | Mobile Phones and Tablets           | Tablets                                                     | /mobile-phones-tablets/tablets                          |
  | Computers                           | Desktops                                                    | /computers/desktops                                     |
  | Computers                           | Internet Gadgets                                            | /computers/internet-gadgets                             |
  | Computers                           | Computer Monitors and LCDs                                  | /computers/computers-monitors-lcds                      |

  @parallel-scenario @cat2
  Scenario Outline: Verify that I should be able to navigate to the corresponding category and single sub category selected
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I click Choose other category link
    Then I should see a modal that contains categories
    And I click category <categoryName> in Modal
    And I click subcategory <subCategory> in Modal page
    And The URL link in listing page should has <categoryLink>

  Examples:
  | categoryName                        | subCategory                                                | categoryLink                                            |
  | Pets and Animals                    | Birds                                                      | /pets-animals/birds                                     |
  | Pets and Animals                    | Cats                                                       | /pets-animals/cats                                      |
  | Beauty, Health, and Grocery         | Beauty, Health, and Grocery                                | /beauty-health-grocery/beauty-health-grocery-products   |
  | Beauty, Health, and Grocery         | Medical and Health Equipment                               | /beauty-health-grocery/medical-health-equipment         |
  | Clothing and Accessories            | Accessories and Sunglasses                                 | /clothing-accessories/accessories-sunglasses            |
  | Clothing and Accessories            | Jewelry and Watches                                        | /clothing-accessories/jewelry-watches                   |
  | Consumer Electronics                | CCTV and Security Products                                 | /consumer-electronics/cctv-security                     |
  | Consumer Electronics                | Office and School Equipment                                | /consumer-electronics/office-school-equipment           |
  | Home and Furniture                  | Home Tools and Accessories                                 | /home-furniture/home-tools-accessories                  |
  | Books, Sports and Hobbies           | Souvenirs and Giveaways                                    | /books-sports-hobbies/souveneirs                        |

  @parallel-scenario @cat3
  Scenario Outline: Verify that I should be able to navigate to the corresponding category and single sub category selected
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I click Choose other category link
    Then I should see a modal that contains categories
    And I click category <categoryName> in Modal
    And I click subcategory <subCategory> in Modal page
    And The URL link in listing page should has <categoryLink>

  Examples:
  | categoryName                        | subCategory                                                | categoryLink                                            |
  | Baby Stuff and Toys                 | Toys and Playthings                                        | /baby-stuff-toys/toys-playthings                        |
  | Services                            | Advertising                                                | /services/advertising                                   |
  | Services                            | Agriculture and Forestry                                   | /services/agriculture-and-forestry                      |

  @parallel-scenario @cati
  Scenario Outline: Verify that I should be able to navigate to the corresponding category and single sub category selected
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I click Choose other category link
    Then I should see a modal that contains categories
    And I click category <categoryName> in Modal
    And I click subcategory <subCategory> in Modal page
    And The URL link in listing page should has <categoryLink>

  Examples:
  | categoryName                        | subCategory                                                | categoryLink                                            |
  | Jobs                                | Accounting and Auditing                                    | /jobs/accounting-and-auditing                           |
  | Jobs                                | Agriculture and Aquaculture                                | /jobs/agriculture-and-aquaculture                       |
  | Motorcycles and Scooters            | Motorcycles                                                | /motorcycles-and-scooters/motorcycles                   |
  | Motorcycles and Scooters            | Scooters                                                   | /motorcycles-and-scooters/scooters                      |

  @parallel-scenario @cat9
  Scenario Outline: Verify that I should be able to navigate to the corresponding category and single sub category selected
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I click Choose other category link
    Then I should see a modal that contains categories
    And I click category <categoryName> in Modal
    And I click subcategory <subCategory> in Modal page
    And The URL link in listing page should has <categoryLink>

  Examples:
  | categoryName                        | subCategory                                                | categoryLink                                                      |
  | Business and Earning Opportunities  | Brokerage                                                  | /business-and-earning-opportunities/brokerage                     |
  | Business and Earning Opportunities  | Distributors                                               | /business-and-earning-opportunities/distributors                  |
  | Business and Earning Opportunities  | Franchising                                                | /business-and-earning-opportunities/franchising                   |
  | Construction and Farming            | Construction Tools                                         | /construction-farming/construction-tools                          |
  | Construction and Farming            | Construction and Building Materials                        | /construction-farming/construction-building-materials             |
  | Heavy Machinery and Trucks          | Construction Machines and Equipment                        | /heavy-machinery-trucks/construction-machines-equipment           |



  @parallel-scenario @subcat
  Scenario Outline: Verify that I should be able to navigate to the corresponding category and single sub category selected
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I click Choose other category link
    Then I should see a modal that contains categories
    And I click category <categoryName> in Modal
    And I click subcategory <subCategory> in Modal page
    And I click another subcategory <subCategory2> in Modal page
    And The URL link in listing page should has <categoryLink>

  Examples:
  | categoryName                        | subCategory                              | subCategory2                                                      |              categoryLink                                                                      |
  | Consumer Electronics                | Audio and Video Electronics              | Amplifiers                                                        | /consumer-electronics/audio-video-electronics/amplifiers                                       |
  | Consumer Electronics                | Audio and Video Electronics              | Antennas and Cables                                               | /consumer-electronics/audio-video-electronics/antennas-cables                                  |
  | Consumer Electronics                | CDs, DVDs, and Blu-ray Discs             | Shows and Movies                                                  | /consumer-electronics/cds-dvds-bluray-discs/shows-movies                                       |
  | Consumer Electronics                | Communication devices (non-mobile phones)| Corded Phone                                                      | /consumer-electronics/communication-devices/corded-phone                                       |
  | Consumer Electronics                | Communication devices (non-mobile phones)| Cordless and Wireless Landline Phone                              | /consumer-electronics/communication-devices/cordless-wireless-landline                         |
  | Consumer Electronics                | Video Games and Consoles                 | Control Pads                                                      | /consumer-electronics/video-game-consoles/control-pads                                         |
  | Consumer Electronics                | Video Games and Consoles                 | Game Cartridges and CDs                                           | /consumer-electronics/video-game-consoles/game-cartriges-cds                                   |
  | Consumer Electronics                | Video Games and Consoles                 | Game Systems (Consoles)                                           | /consumer-electronics/video-game-consoles/game-systems                                         |

  @parallel-scenario @subcat1
  Scenario Outline: Verify that I should be able to navigate to the corresponding category and single sub category selected
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I click Choose other category link
    Then I should see a modal that contains categories
    And I click category <categoryName> in Modal
    And I click subcategory <subCategory> in Modal page
    And I click another subcategory <subCategory2> in Modal page
    And The URL link in listing page should has <categoryLink>

  Examples:
  | categoryName                        | subCategory                              | subCategory2                                                      |              categoryLink                                                                     |
  | Home and Furniture                  | Appliances                               | Air Conditioning and Heating                                      | /home-furniture/appliances/air-conditioning-heating                                           |
  | Home and Furniture                  | Appliances                               | Other Kitchen Appliances                                          | /home-furniture/appliances/other-kitchen-appliances                                           |
  | Home and Furniture                  | Furniture and Fixture                    | Bath Room                                                         | /home-furniture/furniture-fixture/bath-room                                                   |
  | Home and Furniture                  | Outdoors and Gardens                     | Flowers and Plants                                                | /home-furniture/outdoors-gardens/flowers-plants                                               |
  | Home and Furniture                  | Outdoors and Gardens                     | Garden Items and Supplies                                         | /home-furniture/outdoors-gardens/garden-items-supplies                                        |
  | Baby Stuff and Toys                 | Baby Stuff                               | Baby Transport and Gear                                           | /baby-stuff-toys/baby-stuff/baby-transport-gear                                               |
  | Baby Stuff and Toys                 | Baby Stuff                               | Baby Clothes                                                      | /baby-stuff-toys/baby-stuff/baby-clothes                                                      |
  | Baby Stuff and Toys                 | Baby Stuff                               | Gifts and Toys                                                    | /baby-stuff-toys/baby-stuff/gifts-toys                                                        |


  @parallel-scenario @subcat2
  Scenario Outline: Verify that I should be able to navigate to the corresponding category and single sub category selected
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I click Choose other category link
    Then I should see a modal that contains categories
    And I click category <categoryName> in Modal
    And I click subcategory <subCategory> in Modal page
    And I click another subcategory <subCategory2> in Modal page
    And The URL link in listing page should has <categoryLink>

  Examples:
  | categoryName                       | subCategory                              | subCategory2                                                      |              categoryLink                                                                     |
  | Books, Sports and Hobbies          | Arts and Crafts                          | Drawings and Paintings                                            | /books-sports-hobbies/arts-crafts/drawings-paintings                                          |
  | Books, Sports and Hobbies          | Books and other Publications             | Magazines                                                         | /books-sports-hobbies/books-and-other-publications/magazines                                  |
  | Books, Sports and Hobbies          | Collectibles                             | Action Figures and Dolls                                          | /books-sports-hobbies/collectibles/action-figures-and-dolls                                   |
  | Books, Sports and Hobbies          | Musical Instruments                      | Woodwind Instruments                                              | /books-sports-hobbies/musical-instruments/woodwind-instruments                                |
  | Books, Sports and Hobbies          | Sports and Hobbies                       | Board Games                                                       | /books-sports-hobbies/sports-and-hobbies/board-games                                          |
  | Books, Sports and Hobbies          | Sports and Hobbies                       | Water Sports                                                      | /books-sports-hobbies/sports-and-hobbies/water-sports                                         |

  @parallel-scenario @subcat3
  Scenario Outline: Verify that I should be able to navigate to the corresponding category and single sub category selected
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I click Choose other category link
    Then I should see a modal that contains categories
    And I click category <categoryName> in Modal
    And I click subcategory <subCategory> in Modal page
    And I click another subcategory <subCategory2> in Modal page
    And The URL link in listing page should has <categoryLink>

  Examples:
  | categoryName                        | subCategory                              | subCategory2                                                      |              categoryLink                                                                     |
  | Real Estate                         | Real Estate For Rent                     | Rooms and Bed                                                     | /real-estate/real-estate-for-rent/rooms-bed                                                   |
  | Real Estate                         | Real Estate For Rent                     | Apartment and Condominium                                         | /real-estate/real-estate-for-rent/for-rent-apartment-and-condominium                          |
  | Real Estate                         | Real Estate For Sale                     | Commercial and Industrial Properties                              | /real-estate/real-estate-for-sale/commercial-industrial-properties                            |
  | Real Estate                         | Real Estate For Sale                     | House and Lot, Townhouses and Subdivisions                        | /real-estate/real-estate-for-sale/house-lot                                                   |
  | Cars and Automotives                | Automotive Parts and Accessories         | Body Parts and Accessories                                        | /cars-automotives/automotive-parts-and-accessories/automotive-body-parts-and-accessories      |
  | Cars and Automotives                | Cars, SUVs, AUVs, and Pick-ups           | Cars and Sedan                                                    | /cars-automotives/cars-suvs-auvs-pickups/cars-and-sedan                                       |
  | Services                            | Animal Welfare                           | Grooming                                                          | /services/animal-welfare/grooming                                                             |
  | Motorcycles and Scooters            | Motorcycle Parts and Accessories         | Mags and Tires                                                    | /motorcycles-and-scooters/motorcycle-parts-and-accessories/mags-and-tires                     |
  | Heavy Machinery and Trucks          | Trucks                                   | Construction                                                      | /heavy-machinery-trucks/trucks/construction                                                   |
