<?php
namespace App\DataFixtures;

use App\Entity\Beer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class LoadProducts extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // create objects
        $beerCoors = $this->createBeer('Coors Light', "I'm a Light Pale Lager brewed in Canada.", 'Brewed according to the high quality standards of Coors Brewing Company, Golden, Colorado, U.S.A. Aged slowly for that legendary ice cold, easy drinking taste that could only come from a brewing tradition born in the Rockies.', 'coorslight', 'Water, barley malt, corn, yeast and hops', '21.99');
        $beerBud = $this->createBeer('Budweiser', "I'm a Pale Lager brewed in Canada.", 'The famous Budweiser beer. Our exclusive Beechwood Aging produces a taste, smoothness and a drinkability you will find in no other beer at any price.', 'budweiser', 'Barley malt, rice, water, hops and yeast', '32.00');
        $beerGuinness = $this->createBeer('Guinness', "I'm a Dark Stout brewed in Ireland.", "Guinness Draught In a Bottle is a smooth, full bodied and creamy beer. Despite it's body, it is a rather mild and easy drinking beer.", 'guinness',"Water, barley, roast malt extract, hops, and brewer's yeast", '13.75');
        $beerBoxer = $this->createBeer('Boxer Watermelon', "I'm a Malt brewed in United States.", 'Boxer Watermelon is a full flavored lager beer with 8.5% alc/vol, with a refreshing watermelon flavor.', 'boxer', 'Malt, grain and watermelon', '6.98');
        $beerBudLight = $this->createBeer('Bud Light', "I'm a Light Pale Pilsner Lager brewed in Canada.", 'Bud Light is brewed longer, for a refreshingly easy drinking taste, using a blend of rice and malted barley to give it a clean aroma and crisp, smooth finish. Only the finest ingredients are used.', 'budlight', 'Water, barley malt, rice, hops, and yeast', '12.00');
        $beerCorona = $this->createBeer('Corona', "I'm a Pale Pilsner Lager brewed in Mexico.", 'Corona is a premium beer, classic and authentic, recognized worldwide for its high quality, refreshing taste and image. Serve with a lime wedge for an unparalleled flavour of relaxation.', 'corona', 'Barley malt, rice and/or corn, hops, yeast, antioxidants (ascorbic acid), and propylene glycol alginate', '15.00');
        $beerHeineken = $this->createBeer('Heineken', "I'm a Pale Lager brewed in Netherlands.","Brewed in Holland according to the original recipe, Heineken's distinctive flavour offers a refreshing European taste that has made it a favourite all over the world.", 'heineken', 'Water, malted barley, and hops','15.42');
        $beerMolson = $this->createBeer('Molson Canadian', "I'm a Pale Lager brewed in Canada.", 'Molson Canadian is made from the best this land has to offer: Canadian water, prairie barley, and no preservatives. The result is a beer as clean crisp and fresh as the country it comes from. Molson Canadian. Made from Canada.', 'molson','Canadian water, prairie barley, and no preservatives','21.00');
        $beerDragon = $this->createBeer('Dragon Stout',"I'm a Stout brewed in Jamaica.", 'Dark brown/black colour; distinctive, smoky, malty nose; rich, bitter/sweet flavours with smoky and leathery notes.', 'dragon', 'Black malt, corn syrup, caramel malt, and hop extract', '25.00');
        $beerBlue = $this->createBeer('Blue',"I'm a Pale Pilsner Lager brewed in Canada.", "Labatt Blue is a refreshing, pilsener-style lager brewed using John Labatt's founding philosophy that a quality beer should have a real, authentic taste. Blue is made with the finest hops and Canadian Barley malt.", 'blue','Hallertau hops, 2-row malted barley and pure Canadian barley','8.50');
        $beerCarling = $this->createBeer('Carling Larger',"I'm a Pale Lager brewed in Canada.", 'A traditional bottom fermenting lager utilizing Canadian barley malts and selected aroma and bittering hops to produce a fine, clean, crisp refreshing beer.','carling', 'Burton water, white Lager malt, English hops (varies), and yeast','14.50');
        $beerMurphy = $this->createBeer("Murphy's Irish Stout", "I'm a Stout brewed in Ireland.", "A uniquely smooth, creamy and wonderfully pallatable full bodied stout flavour with roasted chocolate and coffee undertones and a 'biscuity sweet' pure malt aroma.", 'murphys','Pale malt, roasted materials, water, hops and yeast','19.99');
        $beerBusch = $this->createBeer('Busch Lager',"I'm a Light Pale Lager brewed in Canada.",'First introduced in 1955, Busch is brewed, fermented and aged to create a smooth, refreshing taste at 4.7% alcohol by volume. Busch is an American-style lager, brewed in Canada with the Anheuser-Busch tradition of excellence.','busch','Premium hops, exceptional barley malt, fine grains and crisp water','9.99');
        $beerMad = $this->createBeer('Mad Jack', "I'm a Malt brewed in Canada.", "Mad Jack is an apple lager crafted with a crisp apple taste that's light in body with a smooth, clean finish. Refreshingly different, it's so good it's crazy.", 'madjack','Malt liquor, carbonated water, glucos-fructose, malic acid, natural flavour, and barley','11.45');
        $beerKeiths = $this->createBeer('Keiths', "I'm an Amber India Pale Ale Ale brewed in Canada.", 'Brewed in Halifax since 1820, India Pale Ale is light in colour and hopped in flavour. Only the lightest and finest barleys that produce a pale malt are used while the amounts of hops are increased so as to give a pronounced hop flavour.','keiths','Cider, water, natural flavour, sulphites, and caramel','5.99');
        $beerBigRig = $this->createBeer('Big Rig Gold',"I'm an Ale brewed in Canada.", 'Our flagship beer is a refreshing golden brew that uses a blend of the finest Canadian and German malts giving it a smooth, mild body that balances the crisp, pleasant German hop finish.','bigriggold','Malt, yeast and water','2.99');
        $beerMickeys = $this->createBeer('Mickeys',"I'm a Malt brewed in United States.", 'The colour is golden, the taste is full bodied and moderately bitter with a clean aftertaste.','mickeys','Malt','7.89');
        $beerTom = $this->createBeer('Beaus Tom Green Beer',"I'm a Stout brewed in Canada.","Beau's and Canadian actor, comedian Tom Green have collaborated to create The Tom Green Beer. A milk stout, The Tom Green Beer displays flavours of chocolate and coffee, while delivering a creamy, velvety texture, and finishing with a mild sweetness.",'tomgreen',"Local spring water, organic barley malts, organic oats, organic lactose (milk), organic hops, brewer\'s yeast",'21.99');
        $beerWhiteWater = $this->createBeer('Whitewater Midnight Stout',"I'm a Stout brewed in Canada.",'Stout is kayaker lingo for what most folk would call- really darned good. Midnight is a stout time to go for a paddle.','whitewater','Water, cider, yeast and malt','12.99');

        // store to DB
        $manager->persist($beerCoors);
        $manager->persist($beerBud);
        $manager->persist($beerGuinness);
        $manager->persist($beerBoxer);
        $manager->persist($beerBudLight);
        $manager->persist($beerCorona);
        $manager->persist($beerHeineken);
        $manager->persist($beerMolson);
        $manager->persist($beerDragon);
        $manager->persist($beerBlue);
        $manager->persist($beerCarling);
        $manager->persist($beerMurphy);
        $manager->persist($beerBusch);
        $manager->persist($beerMad);
        $manager->persist($beerKeiths);
        $manager->persist($beerBigRig);
        $manager->persist($beerMickeys);
        $manager->persist($beerTom);
        $manager->persist($beerWhiteWater);
        $manager->flush();
    }

    /**
     * @param       $name
     * @param       $description
     * @param       $summary
     * @param       $image
     * @param       $ingredients
     * @param       $price
     *
     * @return Beer
     */
    private function createBeer($name, $description, $summary, $image, $ingredients, $price):Beer
    {
        $beer = new Beer();
        $beer->setName($name);
        $beer->setDescription($description);
        $beer->setSummary($summary);
        $beer->setImage($image);
        $beer->setIngredients($ingredients);
        $beer->setPrice($price);

        return $beer;
    }

}