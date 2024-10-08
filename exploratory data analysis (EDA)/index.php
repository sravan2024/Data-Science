{
 "cells": [
  {
   "cell_type": "code",
   "execution_count": 1,
   "metadata": {},
   "outputs": [],
   "source": [
    "import numpy as np\n",
    "import pandas as pd\n",
    "import matplotlib.pyplot as plt\n",
    "import seaborn as sns\n",
    "%matplotlib inline"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 2,
   "metadata": {},
   "outputs": [],
   "source": [
    "train = pd.read_csv(\"Titanic.csv\")"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 3,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/html": [
       "<div>\n",
       "<style scoped>\n",
       "    .dataframe tbody tr th:only-of-type {\n",
       "        vertical-align: middle;\n",
       "    }\n",
       "\n",
       "    .dataframe tbody tr th {\n",
       "        vertical-align: top;\n",
       "    }\n",
       "\n",
       "    .dataframe thead th {\n",
       "        text-align: right;\n",
       "    }\n",
       "</style>\n",
       "<table border=\"1\" class=\"dataframe\">\n",
       "  <thead>\n",
       "    <tr style=\"text-align: right;\">\n",
       "      <th></th>\n",
       "      <th>PassengerId</th>\n",
       "      <th>Survived</th>\n",
       "      <th>Pclass</th>\n",
       "      <th>Name</th>\n",
       "      <th>Sex</th>\n",
       "      <th>Age</th>\n",
       "      <th>SibSp</th>\n",
       "      <th>Parch</th>\n",
       "      <th>Ticket</th>\n",
       "      <th>Fare</th>\n",
       "      <th>Cabin</th>\n",
       "      <th>Embarked</th>\n",
       "    </tr>\n",
       "  </thead>\n",
       "  <tbody>\n",
       "    <tr>\n",
       "      <th>0</th>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Braund, Mr. Owen Harris</td>\n",
       "      <td>male</td>\n",
       "      <td>22.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>A/5 21171</td>\n",
       "      <td>7.2500</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>2</td>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>Cumings, Mrs. John Bradley (Florence Briggs Th...</td>\n",
       "      <td>female</td>\n",
       "      <td>38.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>PC 17599</td>\n",
       "      <td>71.2833</td>\n",
       "      <td>C85</td>\n",
       "      <td>C</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>2</th>\n",
       "      <td>3</td>\n",
       "      <td>1</td>\n",
       "      <td>3</td>\n",
       "      <td>Heikkinen, Miss. Laina</td>\n",
       "      <td>female</td>\n",
       "      <td>26.0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>STON/O2. 3101282</td>\n",
       "      <td>7.9250</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>3</th>\n",
       "      <td>4</td>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>Futrelle, Mrs. Jacques Heath (Lily May Peel)</td>\n",
       "      <td>female</td>\n",
       "      <td>35.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>113803</td>\n",
       "      <td>53.1000</td>\n",
       "      <td>C123</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>4</th>\n",
       "      <td>5</td>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Allen, Mr. William Henry</td>\n",
       "      <td>male</td>\n",
       "      <td>35.0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>373450</td>\n",
       "      <td>8.0500</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>5</th>\n",
       "      <td>6</td>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Moran, Mr. James</td>\n",
       "      <td>male</td>\n",
       "      <td>NaN</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>330877</td>\n",
       "      <td>8.4583</td>\n",
       "      <td>NaN</td>\n",
       "      <td>Q</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>6</th>\n",
       "      <td>7</td>\n",
       "      <td>0</td>\n",
       "      <td>1</td>\n",
       "      <td>McCarthy, Mr. Timothy J</td>\n",
       "      <td>male</td>\n",
       "      <td>54.0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>17463</td>\n",
       "      <td>51.8625</td>\n",
       "      <td>E46</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>7</th>\n",
       "      <td>8</td>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Palsson, Master. Gosta Leonard</td>\n",
       "      <td>male</td>\n",
       "      <td>2.0</td>\n",
       "      <td>3</td>\n",
       "      <td>1</td>\n",
       "      <td>349909</td>\n",
       "      <td>21.0750</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>8</th>\n",
       "      <td>9</td>\n",
       "      <td>1</td>\n",
       "      <td>3</td>\n",
       "      <td>Johnson, Mrs. Oscar W (Elisabeth Vilhelmina Berg)</td>\n",
       "      <td>female</td>\n",
       "      <td>27.0</td>\n",
       "      <td>0</td>\n",
       "      <td>2</td>\n",
       "      <td>347742</td>\n",
       "      <td>11.1333</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>9</th>\n",
       "      <td>10</td>\n",
       "      <td>1</td>\n",
       "      <td>2</td>\n",
       "      <td>Nasser, Mrs. Nicholas (Adele Achem)</td>\n",
       "      <td>female</td>\n",
       "      <td>14.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>237736</td>\n",
       "      <td>30.0708</td>\n",
       "      <td>NaN</td>\n",
       "      <td>C</td>\n",
       "    </tr>\n",
       "  </tbody>\n",
       "</table>\n",
       "</div>"
      ],
      "text/plain": [
       "   PassengerId  Survived  Pclass  \\\n",
       "0            1         0       3   \n",
       "1            2         1       1   \n",
       "2            3         1       3   \n",
       "3            4         1       1   \n",
       "4            5         0       3   \n",
       "5            6         0       3   \n",
       "6            7         0       1   \n",
       "7            8         0       3   \n",
       "8            9         1       3   \n",
       "9           10         1       2   \n",
       "\n",
       "                                                Name     Sex   Age  SibSp  \\\n",
       "0                            Braund, Mr. Owen Harris    male  22.0      1   \n",
       "1  Cumings, Mrs. John Bradley (Florence Briggs Th...  female  38.0      1   \n",
       "2                             Heikkinen, Miss. Laina  female  26.0      0   \n",
       "3       Futrelle, Mrs. Jacques Heath (Lily May Peel)  female  35.0      1   \n",
       "4                           Allen, Mr. William Henry    male  35.0      0   \n",
       "5                                   Moran, Mr. James    male   NaN      0   \n",
       "6                            McCarthy, Mr. Timothy J    male  54.0      0   \n",
       "7                     Palsson, Master. Gosta Leonard    male   2.0      3   \n",
       "8  Johnson, Mrs. Oscar W (Elisabeth Vilhelmina Berg)  female  27.0      0   \n",
       "9                Nasser, Mrs. Nicholas (Adele Achem)  female  14.0      1   \n",
       "\n",
       "   Parch            Ticket     Fare Cabin Embarked  \n",
       "0      0         A/5 21171   7.2500   NaN        S  \n",
       "1      0          PC 17599  71.2833   C85        C  \n",
       "2      0  STON/O2. 3101282   7.9250   NaN        S  \n",
       "3      0            113803  53.1000  C123        S  \n",
       "4      0            373450   8.0500   NaN        S  \n",
       "5      0            330877   8.4583   NaN        Q  \n",
       "6      0             17463  51.8625   E46        S  \n",
       "7      1            349909  21.0750   NaN        S  \n",
       "8      2            347742  11.1333   NaN        S  \n",
       "9      0            237736  30.0708   NaN        C  "
      ]
     },
     "execution_count": 3,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "train.head(10)"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 4,
   "metadata": {},
   "outputs": [],
   "source": [
    "train.drop([\"PassengerId\",'Ticket'],axis = 1,inplace = True)"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "From common sense, columns such as PassengerId, Name and Ticket number shouldn't be related  to the survival probability. So these columns can be droped.\n",
    "It is also seen that there are missing values in Age and Cabin columns which needs to be handeled properly."
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "For additional field knowledge of the titanic survivors:\n",
    "https://titanicfacts.net/titanic-survivors/"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 5,
   "metadata": {},
   "outputs": [
    {
     "name": "stdout",
     "output_type": "stream",
     "text": [
      "<class 'pandas.core.frame.DataFrame'>\n",
      "RangeIndex: 891 entries, 0 to 890\n",
      "Data columns (total 10 columns):\n",
      "Survived    891 non-null int64\n",
      "Pclass      891 non-null int64\n",
      "Name        891 non-null object\n",
      "Sex         891 non-null object\n",
      "Age         714 non-null float64\n",
      "SibSp       891 non-null int64\n",
      "Parch       891 non-null int64\n",
      "Fare        891 non-null float64\n",
      "Cabin       204 non-null object\n",
      "Embarked    889 non-null object\n",
      "dtypes: float64(2), int64(4), object(4)\n",
      "memory usage: 69.7+ KB\n"
     ]
    }
   ],
   "source": [
    "train.info()"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "It indicates that there are total of 891 passesnger details among which 177 people's Age is missing and 687 people's Cabin details are missing. And 2 people's Embarkation details are missing.\n"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 6,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/html": [
       "<div>\n",
       "<style scoped>\n",
       "    .dataframe tbody tr th:only-of-type {\n",
       "        vertical-align: middle;\n",
       "    }\n",
       "\n",
       "    .dataframe tbody tr th {\n",
       "        vertical-align: top;\n",
       "    }\n",
       "\n",
       "    .dataframe thead th {\n",
       "        text-align: right;\n",
       "    }\n",
       "</style>\n",
       "<table border=\"1\" class=\"dataframe\">\n",
       "  <thead>\n",
       "    <tr style=\"text-align: right;\">\n",
       "      <th></th>\n",
       "      <th>Survived</th>\n",
       "      <th>Pclass</th>\n",
       "      <th>Age</th>\n",
       "      <th>SibSp</th>\n",
       "      <th>Parch</th>\n",
       "      <th>Fare</th>\n",
       "    </tr>\n",
       "  </thead>\n",
       "  <tbody>\n",
       "    <tr>\n",
       "      <th>count</th>\n",
       "      <td>891.000000</td>\n",
       "      <td>891.000000</td>\n",
       "      <td>714.000000</td>\n",
       "      <td>891.000000</td>\n",
       "      <td>891.000000</td>\n",
       "      <td>891.000000</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>mean</th>\n",
       "      <td>0.383838</td>\n",
       "      <td>2.308642</td>\n",
       "      <td>29.699118</td>\n",
       "      <td>0.523008</td>\n",
       "      <td>0.381594</td>\n",
       "      <td>32.204208</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>std</th>\n",
       "      <td>0.486592</td>\n",
       "      <td>0.836071</td>\n",
       "      <td>14.526497</td>\n",
       "      <td>1.102743</td>\n",
       "      <td>0.806057</td>\n",
       "      <td>49.693429</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>min</th>\n",
       "      <td>0.000000</td>\n",
       "      <td>1.000000</td>\n",
       "      <td>0.420000</td>\n",
       "      <td>0.000000</td>\n",
       "      <td>0.000000</td>\n",
       "      <td>0.000000</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>25%</th>\n",
       "      <td>0.000000</td>\n",
       "      <td>2.000000</td>\n",
       "      <td>20.125000</td>\n",
       "      <td>0.000000</td>\n",
       "      <td>0.000000</td>\n",
       "      <td>7.910400</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>50%</th>\n",
       "      <td>0.000000</td>\n",
       "      <td>3.000000</td>\n",
       "      <td>28.000000</td>\n",
       "      <td>0.000000</td>\n",
       "      <td>0.000000</td>\n",
       "      <td>14.454200</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>75%</th>\n",
       "      <td>1.000000</td>\n",
       "      <td>3.000000</td>\n",
       "      <td>38.000000</td>\n",
       "      <td>1.000000</td>\n",
       "      <td>0.000000</td>\n",
       "      <td>31.000000</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>max</th>\n",
       "      <td>1.000000</td>\n",
       "      <td>3.000000</td>\n",
       "      <td>80.000000</td>\n",
       "      <td>8.000000</td>\n",
       "      <td>6.000000</td>\n",
       "      <td>512.329200</td>\n",
       "    </tr>\n",
       "  </tbody>\n",
       "</table>\n",
       "</div>"
      ],
      "text/plain": [
       "         Survived      Pclass         Age       SibSp       Parch        Fare\n",
       "count  891.000000  891.000000  714.000000  891.000000  891.000000  891.000000\n",
       "mean     0.383838    2.308642   29.699118    0.523008    0.381594   32.204208\n",
       "std      0.486592    0.836071   14.526497    1.102743    0.806057   49.693429\n",
       "min      0.000000    1.000000    0.420000    0.000000    0.000000    0.000000\n",
       "25%      0.000000    2.000000   20.125000    0.000000    0.000000    7.910400\n",
       "50%      0.000000    3.000000   28.000000    0.000000    0.000000   14.454200\n",
       "75%      1.000000    3.000000   38.000000    1.000000    0.000000   31.000000\n",
       "max      1.000000    3.000000   80.000000    8.000000    6.000000  512.329200"
      ]
     },
     "execution_count": 6,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "train.describe()"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "In the training set:\n",
    "1. 38.3% people survived\n",
    "2. More number of people were actually in 3rd class\n",
    "3. 50% of passengers were in between the age of 20 to 38"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "Since the survival rate is 0.38, even if I decide to give a submission of all passengers being perished, I would still be having a accuracy of 62%. So accuracy cannot be considered as the only measure in saying how good the model is."
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 7,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "image/png": "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\n",
      "text/plain": [
       "<Figure size 432x288 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "sns.countplot(x='Survived', data=train);"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 8,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/plain": [
       "Survived  Sex   \n",
       "0         female     81\n",
       "          male      468\n",
       "1         female    233\n",
       "          male      109\n",
       "Name: Survived, dtype: int64"
      ]
     },
     "execution_count": 8,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "train.groupby(['Survived','Sex'])['Survived'].count()"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 9,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "image/png": "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\n",
      "text/plain": [
       "<Figure size 432x432 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "train[train['Sex'] == 'male'].Survived.groupby(train.Survived).count().plot(kind='pie', figsize=(6, 6),explode=[0,0.05],autopct='%1.1f%%')\n",
    "plt.axis('equal')\n",
    "plt.legend([\"Perished\",\"Survived\"])\n",
    "plt.title(\"Male survival rate\")\n",
    "plt.show()"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 10,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "image/png": "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ddf1831/6baeB1BbW8uMGTPmdzaniEhnOStu1w4++OA1c+bM6QYwbdq0yptvvnn7mpoas88++6y9995755eUlFBeXr739773vaUvvPBCz2uvvfazyy+/fMBvf/vbBQcddNC6k08+OTFnzpzuxhh72mmnrfj5z3++DGD69Om9zz///F2qq6uLb7nllqpx48atqa2t5fzzzx/48ssvV2zatMmcc845yy6++OIV9fX1TJo0aeeXX365YqeddtqoTS1yI5FMXQ4MALoT7EPZ+L/7pj/0WmANwY4zjR+rM/9cDiwCFlVNGb8ht8lFmleQxV1TU8Ozzz7b84gjjlj91ltvdX300Ucr33jjjXllZWX29NNP3/mWW27pc8EFF3y+fv36ohEjRqy/4YYbFgFcfvnlALzyyivlixcvLv3oo4/eBVixYsXmHbxra2vNO++88/6MGTO8K6+8csdx48Z9eMMNN/T1PK9u7ty5769fv97st99+wyZMmLD6tddeK//444/LPvjgg3c/++yz0j333HOPSZMmfe7kh5LfTgeGZPtFE8nUSjIlDiwE/kOwPdsHwAdVU8ZXt/J0kQ4rqOLeuHFj0bBhw4YD7L///tU/+tGPVlx//fV9586dWz5q1KjdATZs2FC03Xbb1QIUFxczadKklU1fZ9iwYRsXLFhQdtZZZ+00YcKE9HHHHbe64WsTJ05cCXDQQQetvfjii7sAzJw5s+e8efPKn3zyyd4A1dXVxe+9917Xv//97xUnnXTSFyUlJSQSiZoDDzxQ/6PnRq5+rr0zjz2a+2IimVpEUOLzMo9ZwJtVU8avzVEeKRAFVdyN57gbWGvNxIkTP7/pppsWNv3+Ll261JeUbP0j6tevX93cuXPfe/zxx3tOmzZtuxkzZlQ+8sgjVQBdu3a1ACUlJdTV1ZmGY1x33XX/OeGEE1Y3fp2nn37aM8Zk7w1KS1z9hbhj5vH1Rp+rTyRT7wOvA29k/jm7asr4jQ7ySUwV1FUlzRk3btzqp59+uvfChQtLAJYuXVr84YcfdmntOYsXLy6pq6tj0qRJq6666qqF77zzTqtXknzzm99M33zzzf02btxoAObMmVO2evXqosMOO6z6kUceqaytrWX+/Pmlr776akX23pk0EqXfZIoIRuiTCHZifw2oTiRTrySSqasTydThiWSqxSuXRKDARtzNGT169IbLLrts4dixY4fU19dTWlpqp06d+p8hQ4Zsauk5VVVVpWeffXaivr7eAFx55ZWftXaMiy66aEVVVVXZnnvuubu11lRWVtY888wz/z7jjDNWPf/88z2HDh26x6BBgzaMGTMmSgUTH75XBPQCPPz0p818x5qQE7VXKXBA5nEpsCGRTP0TeCHzeL1qyvhah/kkYkxYVzLMnj27atSoUStCOVgemj17dt9Ro0YlXOcIne/1ARLALpl/Nvx5Z6APQWH3ABrmnMrw01/6SzeRTN0KfC+UvLmxCkgBTwB/0hy5FPyIWyLA97oDewH7AEPZUs67AO2dPuoBfNHkc3H/TaYXcFrmsSGRTM0kKPEnq6aMX+40mTih4pZw+V4PYG9gNEFRjwaGkb3zLRXkX3E31hU4OvOoSyRT/wAeBB6umjJ+ldNkEhoVt+SO7xlgFPA1YF+Ckh5Cbk+KNzdCz6fibqwYOCzzmJpIplLAPQTTKZoTz2Mqbsku39seOCLz+CawfcgJCqm4GysDjs88liaSqfuAu6qmjH/fbSzJBRW3dI7vlQEHExT1kcBItpwodKG54o76VSXZtj3wE+AniWTqBWAq8FTVlPH1bmNJtqi4pf18rxKYCBxD8Gt6h1dEzIEezXyuEEbcLTk88/g0kUzdBNypufD4K7gbcC655JL+u+666x5DhgwZPmzYsOEvvPBC986+5gMPPOBdeuml/bORr7y8fO9svE7W+V43fO9kfO9JYAlwC3AU0SptKNypkm0ZBPwW+CyRTN2cSKaGuQ4kHeduxO17WV3WFT+9zWVdZ86c2f3ZZ5/t9c4777zXrVs3u3jx4pKGuxm3paamhtLS0ma/dtppp6WBdPsCx4DvFQNjCS5DO472X5rngoq7dd2B7wPnJpKpx4BfVk0ZP8dxJmmnghpxL1y4sLSysrK2W7duFmCHHXaoTSQSNQMGDNhz8eLFJQAvvvhi+ZgxY4YC/M///M+Op5566i5f/epXdzv++OMHjRw5ctgbb7yx+XbkMWPGDH3ppZfKp06d2ufMM8/c+fPPPy8eMGDAnnV1dQBUV1cX9e/ff+TGjRvNu+++W3bIIYfstscee+w+evTooW+//XZXgHnz5nXZa6+9ho0YMWL3H/3oRzuG/kNpju/th+/dAHwGPAucSTxKG1TcbWWAE4FZiWTq8UQytY/rQNJ2BVXcxx577OpFixZ1SSQSI04//fSdU6lUc/OhXzJnzpzyZ5999uOnnnrq0xNOOOGLBx54oBJg/vz5pcuWLSs95JBD1jV8b58+feqGDRu27plnnqkAeOihh7zDDjssXVZWZidPnrzLtGnT/vPuu+++f+211372gx/8YGeA8847b+fJkycvnzt37vv9+/evydV73ybf64rvnYPvzQX+BfwIyMr0T8h0crJ9DHAs8GYimXo6kUyNcR1Itq2gitvzvPq5c+e+d+ONN87v169f7VlnnTV46tSpfVp7zrhx41b16NHDApx55pkrG5Zmvffee3tPmDBhqyVfJ06cuHL69Om9AR5++OHKU045ZWU6nS56++23e0ycOHHwsGHDhp933nm7LFu2rBTgrbfe6nHOOed8AXDuueeGvxa37+2A710FLABuo4UlSmNEI+6OGw+8linw4a7DSMsK7qqSkpISjj766Oqjjz66euTIkevvu+++PsXFxba+PrhSav369V/6y6x79+6bL6EaNGhQTa9evWpfe+21bn/4wx8qb7311q22Mjv11FNXXXnllQOWLl1aPHfu3PIJEyasXr16dVFFRUVt0yVlGzjZRNn39gEuAk4mWOQoXzT3W9Ragp1utIZu24wHxiWSqTuAK6qmjF/mOpB8WUGNuGfPnl32zjvvlDV8/Pbbb3cbOHDgpoEDB256+eWXywEefvjhVjfrPfHEE7+45ppr+ldXVxePGTNmfdOve55XP2rUqLXnnnvuzmPHjk2XlJRQWVlZP3DgwE133XVXb4D6+npeeeWVbgD77LPPmttvv70S4Pbbb2919N9pvleE7x2P770IvEmwM0w+lTY0M+KumjLeoumS9ioGzgU+TiRTP0skU91cB5ItCqq4V69eXXzmmWcOGjx48B5DhgwZPm/evG6//vWvF11xxRWLfvrTn+48evToocXFxa2Ofk8//fSVqVSq8phjjmm6HsZmJ5100so//vGPlaeeeurm75k+ffond999d9+hQ4cO32233fZ47LHHegFMmzbtP7fddtt2I0aM2D2dThe39Jqd4nul+N73gY+Bx4BDcnKcaGjpJKqmSzqmArgK+DCRTJ2ZSKb0W0sEaFnXmOjQsq7BWiGnAlcCg3MQK4pewU8f1PSTiWRqHsHKg9I5LwHn6lZ6twpqxF1QfG888DbwAIVT2tDyiFtTJdlxCMElhFdp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\n",
      "text/plain": [
       "<Figure size 432x432 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "train[train['Sex'] == 'female'].Survived.groupby(train.Survived).count().plot(kind='pie',autopct='%1.1f%%',figsize=(6, 6),explode=[0,0.05])\n",
    "plt.axis('equal')\n",
    "plt.title(\"Female survival rate\")\n",
    "plt.legend([\"Perished\",\"Survived\"])\n",
    "plt.show()"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "The above 2 plots says the females were given more priority than male in the survival process. That too there is a significant difference between the two."
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "So now if we choose just Sex as the only feature and say all females survived and all men perished, then we would end up with an accuracy of 78.67%"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 11,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/html": [
       "<div>\n",
       "<style scoped>\n",
       "    .dataframe tbody tr th:only-of-type {\n",
       "        vertical-align: middle;\n",
       "    }\n",
       "\n",
       "    .dataframe tbody tr th {\n",
       "        vertical-align: top;\n",
       "    }\n",
       "\n",
       "    .dataframe thead th {\n",
       "        text-align: right;\n",
       "    }\n",
       "</style>\n",
       "<table border=\"1\" class=\"dataframe\">\n",
       "  <thead>\n",
       "    <tr style=\"text-align: right;\">\n",
       "      <th>Survived</th>\n",
       "      <th>0</th>\n",
       "      <th>1</th>\n",
       "      <th>All</th>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>Pclass</th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "    </tr>\n",
       "  </thead>\n",
       "  <tbody>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>80</td>\n",
       "      <td>136</td>\n",
       "      <td>216</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>2</th>\n",
       "      <td>97</td>\n",
       "      <td>87</td>\n",
       "      <td>184</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>3</th>\n",
       "      <td>372</td>\n",
       "      <td>119</td>\n",
       "      <td>491</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>All</th>\n",
       "      <td>549</td>\n",
       "      <td>342</td>\n",
       "      <td>891</td>\n",
       "    </tr>\n",
       "  </tbody>\n",
       "</table>\n",
       "</div>"
      ],
      "text/plain": [
       "Survived    0    1  All\n",
       "Pclass                 \n",
       "1          80  136  216\n",
       "2          97   87  184\n",
       "3         372  119  491\n",
       "All       549  342  891"
      ]
     },
     "execution_count": 11,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "pd.crosstab(train.Pclass, train.Survived, margins=True)"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 12,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "image/png": "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ax5AxS0irVJWVnZHv379dujTp8+KkpISLXrUTDU1NWbp0qVDlyxZcgfBWu0tpu+SItJaw/r06bNSpd0yJSUltk+fPinqLGHc4sdoxzwiUlxKVNqtk/66tbp/VdwiElqlpaWjhwwZMnTQoEE7HnDAAdtUVFS0qNOOOuqord55551OmT6/6667bj958uQumT7flHHjxkXuuuuuTVt7/0x0jFtE2kUklhjdno+XjEffaWpMx44da+bMmTMb4JBDDtn6uuuu6+P7/hfNefyqqioefPDBeW3N6YJm3CJFyhizvzHmQ2PMXGNMzHWettpzzz1XzZ07tyPAhAkTeg4fPnyHIUOGDD322GO3qqoKNivq0qXLqF/96lcDRowYMeTll1/uWjujrqqqYty4cZFBgwbtOHjw4KGXX35539rHnTRp0qbDhw/fIRKJDHvuuee6QlD6Z5555sBhw4btMHjw4KF//vOfewPU1NRw4oknbrntttvuuM8++2y3bNmyrEyOVdwiRcgYUwrcAhwADAWOMcYMdZuq9davX8/zzz/fffjw4ZXvvvtup0ceeaTn1KlT58yZM2d2SUmJvfXWW3sBVFZWlgwbNqxyxowZc/bbb79VtfefMmVKl8WLF3f4+OOP3//oo49m//znP/+q9nNVVVVm5syZH/zpT39acMUVVwwA+Otf/9rb87zqWbNmfTB9+vQP/vnPf/aZM2dO+b333ttj7ty5HT/88MP377777nnvvvtu12y8Xh0qESlOuwJzrbWfAhhjHiC9I73TVC20du3akiFDhgwF2G233SrOO++8Zddff33vWbNmdRk5cuQOAGvWrCnp27dvFUBpaSknn3zyivqPM2TIkLULFizoeNJJJ21x8MEHpw4//PCVtZ8bP378CoA99tjjm4suuqgc4KWXXuo+Z86cLk8++eSmABUVFaWzZ8/u9Oqrr3Y78sgjl5eVlRGJRNbvvvvuFdl43SpukeK0OcFGwbU+B3ZzlKXV6h7jrmWtNePHj//qlltuWVh/fHl5eU1Z2ca116dPn+pZs2bNfuyxx7pPmDCh74MPPtjz4YcfTgJ06tTJApSVlVFdXW1qn+O6666bP27cuJV1H+fpp5/2jDHt9wIz0KESkeLUULsUxKl9+++//8qnn35604ULF5YBfPHFF6UfffRReWP3Wbx4cVl1dTUnn3zy11ddddXC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\n",
      "text/plain": [
       "<Figure size 432x432 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "train[train['Pclass'] == 1].Survived.groupby(train.Survived).count().plot(kind='pie', figsize=(6, 6),explode=[0,0.05],autopct='%1.1f%%')\n",
    "plt.axis('equal')\n",
    "plt.legend([\"Perished\",\"Survived\"])\n",
    "plt.title(\"First class survival rate\")\n",
    "plt.show()"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 13,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "image/png": "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\n",
      "text/plain": [
       "<Figure size 432x432 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "train[train['Pclass'] == 2].Survived.groupby(train.Survived).count().plot(kind='pie', figsize=(6, 6),explode=[0,0.05],autopct='%1.1f%%')\n",
    "plt.axis('equal')\n",
    "plt.legend([\"Perished\",\"Survived\"])\n",
    "plt.title(\"Second class survival rate\")\n",
    "plt.show()"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 14,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "image/png": "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QK57gYtHt7ssA54ffM7zgz8DcwjPEFFpl4ftCUfeb3t+cEF04LmkfPDBB9WDBw9u7NOnjwXYZpttGj3Pa9h2220nLFy4sApg5syZtVOmTBkN8O1vf3vYiSeeuMNee+018phjjhkxceLEMc8///yGm5hNmTJl9JNPPll75ZVXbnHqqadu/9FHH1Vuu+22E5qamgBYuXJlxdChQyfW19ebOXPm1Oyzzz4jx40bN3by5MmjX3zxxd4A8+bN67XrrruOGT9+/Njzzz9/WCHet4q7hHl+8EXPD54AniY8G0FniJSnYYTz4O94fnCh5wclMz121FFHrViwYEEvz/PGn3LKKdsHQdCvs+955ZVXah9++OG3/vKXv7wzderUZbfddttggHfffbf6ww8/rN5nn302nGq5xRZbNI0ZM2bNgw8+2B/gjjvuqNtvv/1yNTU19qyzztph+vTp782ZM2fuZZddNv+cc87ZHuDcc8/d/qyzzloye/bsuUOHDi3IVJWKuwR5fvBlzw9eAh4kvHBGBGBr4BfAu54f/I/nB4k/e6iurq559uzZr1111VXvDhkypPG0007b6corr9yio+857LDDlvfr188CnHrqqR+33Jr1lltuGXTEEUdscmbOscce+/GMGTMGAdx1112DTzjhhI9zuVzFiy++2O/YY4/dacyYMbuce+65O3z44YfVALNmzep39tlnLwOYNm1a3u/FDZrjLimeH+wBXAbs4zqLxNoWwE+A73h+8Bvgl9lMqkcH81yqqqri8MMPX3n44YevnDhx4tpbb711i8rKStvcHN5Nd+3atZ8aoPbt23fDbXZHjBjRMHDgwMZnn322zx//+MfB11133SZLmZ144onLL7nkkm0XL15cOXv27NojjjhixYoVKyr69+/fuPEtZVsUehFljbhLgOcHIz0/uAd4BpW2dN0gIA287vnBSY6zbJaXX3655tVXX61p+fOLL77YZ/jw4euHDx++/qmnnqoFuOuuuzpcrPcrX/nKsksvvXToypUrK6dMmbJ246/X1dU1T5o0afW0adO2P/DAA3NVVVUMHjy4efjw4etvvPHGQRAuWfb000/3Adhtt91W3XDDDYMBbrjhhg5H/5tLxZ1gnh8M9Pzg14QHHae6ziOJtS1wm+cHT3p+8BnXYbpjxYoVlaeeeuqInXbaadyoUaN2mTdvXp+f//zn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\n",
      "text/plain": [
       "<Figure size 432x432 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "train[train['Pclass'] == 3].Survived.groupby(train.Survived).count().plot(kind='pie', figsize=(6, 6),explode=[0,0.05],autopct='%1.1f%%')\n",
    "plt.axis('equal')\n",
    "plt.legend([\"Perished\",\"Survived\"])\n",
    "plt.title(\"Third class survival rate\")\n",
    "plt.show()"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 15,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/html": [
       "<div>\n",
       "<style scoped>\n",
       "    .dataframe tbody tr th:only-of-type {\n",
       "        vertical-align: middle;\n",
       "    }\n",
       "\n",
       "    .dataframe tbody tr th {\n",
       "        vertical-align: top;\n",
       "    }\n",
       "\n",
       "    .dataframe thead th {\n",
       "        text-align: right;\n",
       "    }\n",
       "</style>\n",
       "<table border=\"1\" class=\"dataframe\">\n",
       "  <thead>\n",
       "    <tr style=\"text-align: right;\">\n",
       "      <th></th>\n",
       "      <th>Pclass</th>\n",
       "      <th>1</th>\n",
       "      <th>2</th>\n",
       "      <th>3</th>\n",
       "      <th>All</th>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>Sex</th>\n",
       "      <th>Survived</th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "    </tr>\n",
       "  </thead>\n",
       "  <tbody>\n",
       "    <tr>\n",
       "      <th rowspan=\"2\" valign=\"top\">female</th>\n",
       "      <th>0</th>\n",
       "      <td>3</td>\n",
       "      <td>6</td>\n",
       "      <td>72</td>\n",
       "      <td>81</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>91</td>\n",
       "      <td>70</td>\n",
       "      <td>72</td>\n",
       "      <td>233</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th rowspan=\"2\" valign=\"top\">male</th>\n",
       "      <th>0</th>\n",
       "      <td>77</td>\n",
       "      <td>91</td>\n",
       "      <td>300</td>\n",
       "      <td>468</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>45</td>\n",
       "      <td>17</td>\n",
       "      <td>47</td>\n",
       "      <td>109</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>All</th>\n",
       "      <th></th>\n",
       "      <td>216</td>\n",
       "      <td>184</td>\n",
       "      <td>491</td>\n",
       "      <td>891</td>\n",
       "    </tr>\n",
       "  </tbody>\n",
       "</table>\n",
       "</div>"
      ],
      "text/plain": [
       "Pclass             1    2    3  All\n",
       "Sex    Survived                    \n",
       "female 0           3    6   72   81\n",
       "       1          91   70   72  233\n",
       "male   0          77   91  300  468\n",
       "       1          45   17   47  109\n",
       "All              216  184  491  891"
      ]
     },
     "execution_count": 15,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "pd.crosstab([train.Sex, train.Survived], train.Pclass, margins=True)"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 16,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/plain": [
       "<matplotlib.axes._subplots.AxesSubplot at 0x22abad779e8>"
      ]
     },
     "execution_count": 16,
     "metadata": {},
     "output_type": "execute_result"
    },
    {
     "data": {
      "image/png": "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\n",
      "text/plain": [
       "<Figure size 432x288 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "sns.barplot('Pclass','Survived',hue='Sex', data=train)"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 17,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "image/png": "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\n",
      "text/plain": [
       "<Figure size 432x288 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "sns.countplot(x='Survived', data=train,hue = 'Embarked');\n"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 18,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/html": [
       "<div>\n",
       "<style scoped>\n",
       "    .dataframe tbody tr th:only-of-type {\n",
       "        vertical-align: middle;\n",
       "    }\n",
       "\n",
       "    .dataframe tbody tr th {\n",
       "        vertical-align: top;\n",
       "    }\n",
       "\n",
       "    .dataframe thead tr th {\n",
       "        text-align: left;\n",
       "    }\n",
       "\n",
       "    .dataframe thead tr:last-of-type th {\n",
       "        text-align: right;\n",
       "    }\n",
       "</style>\n",
       "<table border=\"1\" class=\"dataframe\">\n",
       "  <thead>\n",
       "    <tr>\n",
       "      <th></th>\n",
       "      <th>SibSp</th>\n",
       "      <th colspan=\"3\" halign=\"left\">0</th>\n",
       "      <th colspan=\"3\" halign=\"left\">1</th>\n",
       "      <th colspan=\"3\" halign=\"left\">2</th>\n",
       "      <th colspan=\"3\" halign=\"left\">3</th>\n",
       "      <th>4</th>\n",
       "      <th>5</th>\n",
       "      <th>8</th>\n",
       "      <th>All</th>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th></th>\n",
       "      <th>Pclass</th>\n",
       "      <th>1</th>\n",
       "      <th>2</th>\n",
       "      <th>3</th>\n",
       "      <th>1</th>\n",
       "      <th>2</th>\n",
       "      <th>3</th>\n",
       "      <th>1</th>\n",
       "      <th>2</th>\n",
       "      <th>3</th>\n",
       "      <th>1</th>\n",
       "      <th>2</th>\n",
       "      <th>3</th>\n",
       "      <th>3</th>\n",
       "      <th>3</th>\n",
       "      <th>3</th>\n",
       "      <th></th>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>Sex</th>\n",
       "      <th>Survived</th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "    </tr>\n",
       "  </thead>\n",
       "  <tbody>\n",
       "    <tr>\n",
       "      <th rowspan=\"2\" valign=\"top\">female</th>\n",
       "      <th>0</th>\n",
       "      <td>1</td>\n",
       "      <td>3</td>\n",
       "      <td>33</td>\n",
       "      <td>2</td>\n",
       "      <td>3</td>\n",
       "      <td>21</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>7</td>\n",
       "      <td>4</td>\n",
       "      <td>1</td>\n",
       "      <td>3</td>\n",
       "      <td>81</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>48</td>\n",
       "      <td>41</td>\n",
       "      <td>48</td>\n",
       "      <td>38</td>\n",
       "      <td>25</td>\n",
       "      <td>17</td>\n",
       "      <td>3</td>\n",
       "      <td>3</td>\n",
       "      <td>4</td>\n",
       "      <td>2</td>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>2</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>233</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th rowspan=\"2\" valign=\"top\">male</th>\n",
       "      <th>0</th>\n",
       "      <td>59</td>\n",
       "      <td>67</td>\n",
       "      <td>235</td>\n",
       "      <td>16</td>\n",
       "      <td>20</td>\n",
       "      <td>35</td>\n",
       "      <td>1</td>\n",
       "      <td>4</td>\n",
       "      <td>7</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>4</td>\n",
       "      <td>11</td>\n",
       "      <td>4</td>\n",
       "      <td>4</td>\n",
       "      <td>468</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>29</td>\n",
       "      <td>9</td>\n",
       "      <td>35</td>\n",
       "      <td>15</td>\n",
       "      <td>7</td>\n",
       "      <td>10</td>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>109</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>All</th>\n",
       "      <th></th>\n",
       "      <td>137</td>\n",
       "      <td>120</td>\n",
       "      <td>351</td>\n",
       "      <td>71</td>\n",
       "      <td>55</td>\n",
       "      <td>83</td>\n",
       "      <td>5</td>\n",
       "      <td>8</td>\n",
       "      <td>15</td>\n",
       "      <td>3</td>\n",
       "      <td>1</td>\n",
       "      <td>12</td>\n",
       "      <td>18</td>\n",
       "      <td>5</td>\n",
       "      <td>7</td>\n",
       "      <td>891</td>\n",
       "    </tr>\n",
       "  </tbody>\n",
       "</table>\n",
       "</div>"
      ],
      "text/plain": [
       "SibSp              0             1          2         3          4  5  8  All\n",
       "Pclass             1    2    3   1   2   3  1  2   3  1  2   3   3  3  3     \n",
       "Sex    Survived                                                              \n",
       "female 0           1    3   33   2   3  21  0  0   3  0  0   7   4  1  3   81\n",
       "       1          48   41   48  38  25  17  3  3   4  2  1   1   2  0  0  233\n",
       "male   0          59   67  235  16  20  35  1  4   7  1  0   4  11  4  4  468\n",
       "       1          29    9   35  15   7  10  1  1   1  0  0   0   1  0  0  109\n",
       "All              137  120  351  71  55  83  5  8  15  3  1  12  18  5  7  891"
      ]
     },
     "execution_count": 18,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "pd.crosstab([train.Sex, train.Survived], [train.SibSp, train.Pclass], margins=True)"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "The above crosstab indicates 2 things:\n",
    "1. Most of the passerenges didn'y had siblings onboard and the majority had atmost 1 sibling onboard\n",
    "\n",
    "2. Not much of priority was given to the passengers who had sibelings onboard in the rescue operation"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 19,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/html": [
       "<div>\n",
       "<style scoped>\n",
       "    .dataframe tbody tr th:only-of-type {\n",
       "        vertical-align: middle;\n",
       "    }\n",
       "\n",
       "    .dataframe tbody tr th {\n",
       "        vertical-align: top;\n",
       "    }\n",
       "\n",
       "    .dataframe thead tr th {\n",
       "        text-align: left;\n",
       "    }\n",
       "\n",
       "    .dataframe thead tr:last-of-type th {\n",
       "        text-align: right;\n",
       "    }\n",
       "</style>\n",
       "<table border=\"1\" class=\"dataframe\">\n",
       "  <thead>\n",
       "    <tr>\n",
       "      <th></th>\n",
       "      <th>Parch</th>\n",
       "      <th colspan=\"3\" halign=\"left\">0</th>\n",
       "      <th colspan=\"3\" halign=\"left\">1</th>\n",
       "      <th colspan=\"3\" halign=\"left\">2</th>\n",
       "      <th colspan=\"2\" halign=\"left\">3</th>\n",
       "      <th colspan=\"2\" halign=\"left\">4</th>\n",
       "      <th>5</th>\n",
       "      <th>6</th>\n",
       "      <th>All</th>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th></th>\n",
       "      <th>Pclass</th>\n",
       "      <th>1</th>\n",
       "      <th>2</th>\n",
       "      <th>3</th>\n",
       "      <th>1</th>\n",
       "      <th>2</th>\n",
       "      <th>3</th>\n",
       "      <th>1</th>\n",
       "      <th>2</th>\n",
       "      <th>3</th>\n",
       "      <th>2</th>\n",
       "      <th>3</th>\n",
       "      <th>1</th>\n",
       "      <th>3</th>\n",
       "      <th>3</th>\n",
       "      <th>3</th>\n",
       "      <th></th>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>Sex</th>\n",
       "      <th>Survived</th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "    </tr>\n",
       "  </thead>\n",
       "  <tbody>\n",
       "    <tr>\n",
       "      <th rowspan=\"2\" valign=\"top\">female</th>\n",
       "      <th>0</th>\n",
       "      <td>1</td>\n",
       "      <td>5</td>\n",
       "      <td>35</td>\n",
       "      <td>0</td>\n",
       "      <td>1</td>\n",
       "      <td>13</td>\n",
       "      <td>2</td>\n",
       "      <td>0</td>\n",
       "      <td>17</td>\n",
       "      <td>0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>2</td>\n",
       "      <td>3</td>\n",
       "      <td>1</td>\n",
       "      <td>81</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>63</td>\n",
       "      <td>40</td>\n",
       "      <td>50</td>\n",
       "      <td>17</td>\n",
       "      <td>17</td>\n",
       "      <td>12</td>\n",
       "      <td>11</td>\n",
       "      <td>11</td>\n",
       "      <td>8</td>\n",
       "      <td>2</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>233</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th rowspan=\"2\" valign=\"top\">male</th>\n",
       "      <th>0</th>\n",
       "      <td>63</td>\n",
       "      <td>81</td>\n",
       "      <td>260</td>\n",
       "      <td>10</td>\n",
       "      <td>7</td>\n",
       "      <td>22</td>\n",
       "      <td>3</td>\n",
       "      <td>3</td>\n",
       "      <td>15</td>\n",
       "      <td>0</td>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>468</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>36</td>\n",
       "      <td>8</td>\n",
       "      <td>36</td>\n",
       "      <td>4</td>\n",
       "      <td>7</td>\n",
       "      <td>8</td>\n",
       "      <td>5</td>\n",
       "      <td>2</td>\n",
       "      <td>3</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>109</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>All</th>\n",
       "      <th></th>\n",
       "      <td>163</td>\n",
       "      <td>134</td>\n",
       "      <td>381</td>\n",
       "      <td>31</td>\n",
       "      <td>32</td>\n",
       "      <td>55</td>\n",
       "      <td>21</td>\n",
       "      <td>16</td>\n",
       "      <td>43</td>\n",
       "      <td>2</td>\n",
       "      <td>3</td>\n",
       "      <td>1</td>\n",
       "      <td>3</td>\n",
       "      <td>5</td>\n",
       "      <td>1</td>\n",
       "      <td>891</td>\n",
       "    </tr>\n",
       "  </tbody>\n",
       "</table>\n",
       "</div>"
      ],
      "text/plain": [
       "Parch              0             1           2          3     4     5  6  All\n",
       "Pclass             1    2    3   1   2   3   1   2   3  2  3  1  3  3  3     \n",
       "Sex    Survived                                                              \n",
       "female 0           1    5   35   0   1  13   2   0  17  0  1  0  2  3  1   81\n",
       "       1          63   40   50  17  17  12  11  11   8  2  1  0  0  1  0  233\n",
       "male   0          63   81  260  10   7  22   3   3  15  0  1  1  1  1  0  468\n",
       "       1          36    8   36   4   7   8   5   2   3  0  0  0  0  0  0  109\n",
       "All              163  134  381  31  32  55  21  16  43  2  3  1  3  5  1  891"
      ]
     },
     "execution_count": 19,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "pd.crosstab([train.Sex, train.Survived], [train.Parch, train.Pclass], margins=True)"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "The above crosstab indicates 2 things:\n",
    "\n",
    "1. Most of the passerenges didn't had parents onboard and the majority had atmost 1 parent onboard\n",
    "2. Not much of priority was given to the passengers who had parents onboard in the rescue operation"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 20,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/html": [
       "<div>\n",
       "<style scoped>\n",
       "    .dataframe tbody tr th:only-of-type {\n",
       "        vertical-align: middle;\n",
       "    }\n",
       "\n",
       "    .dataframe tbody tr th {\n",
       "        vertical-align: top;\n",
       "    }\n",
       "\n",
       "    .dataframe thead th {\n",
       "        text-align: right;\n",
       "    }\n",
       "</style>\n",
       "<table border=\"1\" class=\"dataframe\">\n",
       "  <thead>\n",
       "    <tr style=\"text-align: right;\">\n",
       "      <th></th>\n",
       "      <th>Survived</th>\n",
       "      <th>Pclass</th>\n",
       "      <th>Age</th>\n",
       "      <th>SibSp</th>\n",
       "      <th>Parch</th>\n",
       "      <th>Fare</th>\n",
       "    </tr>\n",
       "  </thead>\n",
       "  <tbody>\n",
       "    <tr>\n",
       "      <th>Survived</th>\n",
       "      <td>1.000000</td>\n",
       "      <td>-0.338481</td>\n",
       "      <td>-0.077221</td>\n",
       "      <td>-0.035322</td>\n",
       "      <td>0.081629</td>\n",
       "      <td>0.257307</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>Pclass</th>\n",
       "      <td>-0.338481</td>\n",
       "      <td>1.000000</td>\n",
       "      <td>-0.369226</td>\n",
       "      <td>0.083081</td>\n",
       "      <td>0.018443</td>\n",
       "      <td>-0.549500</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>Age</th>\n",
       "      <td>-0.077221</td>\n",
       "      <td>-0.369226</td>\n",
       "      <td>1.000000</td>\n",
       "      <td>-0.308247</td>\n",
       "      <td>-0.189119</td>\n",
       "      <td>0.096067</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>SibSp</th>\n",
       "      <td>-0.035322</td>\n",
       "      <td>0.083081</td>\n",
       "      <td>-0.308247</td>\n",
       "      <td>1.000000</td>\n",
       "      <td>0.414838</td>\n",
       "      <td>0.159651</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>Parch</th>\n",
       "      <td>0.081629</td>\n",
       "      <td>0.018443</td>\n",
       "      <td>-0.189119</td>\n",
       "      <td>0.414838</td>\n",
       "      <td>1.000000</td>\n",
       "      <td>0.216225</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>Fare</th>\n",
       "      <td>0.257307</td>\n",
       "      <td>-0.549500</td>\n",
       "      <td>0.096067</td>\n",
       "      <td>0.159651</td>\n",
       "      <td>0.216225</td>\n",
       "      <td>1.000000</td>\n",
       "    </tr>\n",
       "  </tbody>\n",
       "</table>\n",
       "</div>"
      ],
      "text/plain": [
       "          Survived    Pclass       Age     SibSp     Parch      Fare\n",
       "Survived  1.000000 -0.338481 -0.077221 -0.035322  0.081629  0.257307\n",
       "Pclass   -0.338481  1.000000 -0.369226  0.083081  0.018443 -0.549500\n",
       "Age      -0.077221 -0.369226  1.000000 -0.308247 -0.189119  0.096067\n",
       "SibSp    -0.035322  0.083081 -0.308247  1.000000  0.414838  0.159651\n",
       "Parch     0.081629  0.018443 -0.189119  0.414838  1.000000  0.216225\n",
       "Fare      0.257307 -0.549500  0.096067  0.159651  0.216225  1.000000"
      ]
     },
     "execution_count": 20,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "train.corr()"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "The above correlation table indicated below features:\n",
    "\n",
    "1. The Age was not a priority in the rescue operation similat to the sibelings and parents column as correlation with the target variable is very low\n",
    "2. There should have been a higher correlation between the Fare and Pclass"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 21,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/html": [
       "<div>\n",
       "<style scoped>\n",
       "    .dataframe tbody tr th:only-of-type {\n",
       "        vertical-align: middle;\n",
       "    }\n",
       "\n",
       "    .dataframe tbody tr th {\n",
       "        vertical-align: top;\n",
       "    }\n",
       "\n",
       "    .dataframe thead th {\n",
       "        text-align: right;\n",
       "    }\n",
       "</style>\n",
       "<table border=\"1\" class=\"dataframe\">\n",
       "  <thead>\n",
       "    <tr style=\"text-align: right;\">\n",
       "      <th></th>\n",
       "      <th>Survived</th>\n",
       "      <th>Pclass</th>\n",
       "      <th>Name</th>\n",
       "      <th>Sex</th>\n",
       "      <th>Age</th>\n",
       "      <th>SibSp</th>\n",
       "      <th>Parch</th>\n",
       "      <th>Fare</th>\n",
       "      <th>Cabin</th>\n",
       "      <th>Embarked</th>\n",
       "    </tr>\n",
       "  </thead>\n",
       "  <tbody>\n",
       "    <tr>\n",
       "      <th>0</th>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Braund, Mr. Owen Harris</td>\n",
       "      <td>male</td>\n",
       "      <td>22.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>7.2500</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>Cumings, Mrs. John Bradley (Florence Briggs Th...</td>\n",
       "      <td>female</td>\n",
       "      <td>38.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>71.2833</td>\n",
       "      <td>C85</td>\n",
       "      <td>C</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>2</th>\n",
       "      <td>1</td>\n",
       "      <td>3</td>\n",
       "      <td>Heikkinen, Miss. Laina</td>\n",
       "      <td>female</td>\n",
       "      <td>26.0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>7.9250</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>3</th>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>Futrelle, Mrs. Jacques Heath (Lily May Peel)</td>\n",
       "      <td>female</td>\n",
       "      <td>35.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>53.1000</td>\n",
       "      <td>C123</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>4</th>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Allen, Mr. William Henry</td>\n",
       "      <td>male</td>\n",
       "      <td>35.0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>8.0500</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>5</th>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Moran, Mr. James</td>\n",
       "      <td>male</td>\n",
       "      <td>NaN</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>8.4583</td>\n",
       "      <td>NaN</td>\n",
       "      <td>Q</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>6</th>\n",
       "      <td>0</td>\n",
       "      <td>1</td>\n",
       "      <td>McCarthy, Mr. Timothy J</td>\n",
       "      <td>male</td>\n",
       "      <td>54.0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>51.8625</td>\n",
       "      <td>E46</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>7</th>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Palsson, Master. Gosta Leonard</td>\n",
       "      <td>male</td>\n",
       "      <td>2.0</td>\n",
       "      <td>3</td>\n",
       "      <td>1</td>\n",
       "      <td>21.0750</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>8</th>\n",
       "      <td>1</td>\n",
       "      <td>3</td>\n",
       "      <td>Johnson, Mrs. Oscar W (Elisabeth Vilhelmina Berg)</td>\n",
       "      <td>female</td>\n",
       "      <td>27.0</td>\n",
       "      <td>0</td>\n",
       "      <td>2</td>\n",
       "      <td>11.1333</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>9</th>\n",
       "      <td>1</td>\n",
       "      <td>2</td>\n",
       "      <td>Nasser, Mrs. Nicholas (Adele Achem)</td>\n",
       "      <td>female</td>\n",
       "      <td>14.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>30.0708</td>\n",
       "      <td>NaN</td>\n",
       "      <td>C</td>\n",
       "    </tr>\n",
       "  </tbody>\n",
       "</table>\n",
       "</div>"
      ],
      "text/plain": [
       "   Survived  Pclass                                               Name  \\\n",
       "0         0       3                            Braund, Mr. Owen Harris   \n",
       "1         1       1  Cumings, Mrs. John Bradley (Florence Briggs Th...   \n",
       "2         1       3                             Heikkinen, Miss. Laina   \n",
       "3         1       1       Futrelle, Mrs. Jacques Heath (Lily May Peel)   \n",
       "4         0       3                           Allen, Mr. William Henry   \n",
       "5         0       3                                   Moran, Mr. James   \n",
       "6         0       1                            McCarthy, Mr. Timothy J   \n",
       "7         0       3                     Palsson, Master. Gosta Leonard   \n",
       "8         1       3  Johnson, Mrs. Oscar W (Elisabeth Vilhelmina Berg)   \n",
       "9         1       2                Nasser, Mrs. Nicholas (Adele Achem)   \n",
       "\n",
       "      Sex   Age  SibSp  Parch     Fare Cabin Embarked  \n",
       "0    male  22.0      1      0   7.2500   NaN        S  \n",
       "1  female  38.0      1      0  71.2833   C85        C  \n",
       "2  female  26.0      0      0   7.9250   NaN        S  \n",
       "3  female  35.0      1      0  53.1000  C123        S  \n",
       "4    male  35.0      0      0   8.0500   NaN        S  \n",
       "5    male   NaN      0      0   8.4583   NaN        Q  \n",
       "6    male  54.0      0      0  51.8625   E46        S  \n",
       "7    male   2.0      3      1  21.0750   NaN        S  \n",
       "8  female  27.0      0      2  11.1333   NaN        S  \n",
       "9  female  14.0      1      0  30.0708   NaN        C  "
      ]
     },
     "execution_count": 21,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "train.head(10)"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 22,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/plain": [
       "<matplotlib.axes._subplots.AxesSubplot at 0x22abae52dd8>"
      ]
     },
     "execution_count": 22,
     "metadata": {},
     "output_type": "execute_result"
    },
    {
     "data": {
      "image/png": "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\n",
      "text/plain": [
       "<Figure size 432x288 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "sns.barplot(y = \"Fare\",x = \"Pclass\",data = train)"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 23,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "image/png": "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\n",
      "text/plain": [
       "<Figure size 432x288 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "sns.swarmplot(x='Survived', y='Fare', data=train);"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 24,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/plain": [
       "<matplotlib.axes._subplots.AxesSubplot at 0x22abaf02390>"
      ]
     },
     "execution_count": 24,
     "metadata": {},
     "output_type": "execute_result"
    },
    {
     "data": {
      "image/png": "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\n",
      "text/plain": [
       "<Figure size 432x288 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "sns.boxplot(y = \"Fare\",x = \"Pclass\",data = train[train[\"Fare\"] < 200])"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 25,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/plain": [
       "<matplotlib.axes._subplots.AxesSubplot at 0x22abaf84080>"
      ]
     },
     "execution_count": 25,
     "metadata": {},
     "output_type": "execute_result"
    },
    {
     "data": {
      "image/png": "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\n",
      "text/plain": [
       "<Figure size 432x288 with 1 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "sns.barplot(y = \"Fare\",x = \"Pclass\",data = train[train[\"Fare\"] < 200])"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 26,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/plain": [
       "<seaborn.axisgrid.PairGrid at 0x22abaf63f98>"
      ]
     },
     "execution_count": 26,
     "metadata": {},
     "output_type": "execute_result"
    },
    {
     "data": {
      "image/png": "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xiLT1krtjoduf/52q+yz+yKUjzMW80hVfFDQt+d6FJt83dtzna54fbXj+UY/sycm4lXXzb0+Nu5Pfo4pXM/q9nc1z+HBnut+eYzUlfHr1fk7y15F5+wWEYmoBWO37PPPbGt+M0REREREJCK0J0hEREREREREJES0skZEQkmrUUREREREpFtpZY2IiIiIiIiISIhoskZEREREREREJERaUrp7phhjtgNPT+Gh84ChGW5OmOn1T+31D1lr3zPTjVHcTplef4jiFqYUu2H/m4W9fRD+NjarfWGK27Kw/9+XRaWd0HltVdyGj15/iMYKXRi3eh0zq2V9blhFerJmqowxW6y1i9vdjnbR64/m649qu5tFrz96rz/sbQ57+yD8bQx7+6YjKq8tKu0EtbUVotruZtHrj+brj2q7a+l1yEzTNigRERERERERkRDRZI2IiIiIiIiISIh0y2TN9e1uQJvp9UdTVNvdLHr90RP2Noe9fRD+Noa9fdMRldcWlXaC2toKUW13s+j1R1NU211Lr0NmVFfkrBERERERERERiYpuWVkjIiIiIiIiIhIJmqwREREREREREQkRTdaIiIiIiIiIiISIJmtEREREREREREJEkzUiIiIiIiIiIiGiyRoRERERERERkRDRZI2IiIiIiIiISIhoskZEREREREREJEQ0WSMiIiIiIiIiEiKarBERERERERERCRFN1oiIiIiIiIiIhIgma0REREREREREQkSTNSIiIiIiIiIiIaLJGhERERERERGREIn0ZM173vMeC+hLX836agnFrb6a/NUyil19NfGrZRS3+mriV8sobvXV5K+WUNzqq8lfXS/SkzVDQ0PtboLIPlPcSlQpdiWKFLcSRYpbiSLFrUhzRXqyRkRERERERESk02iyRkREREREREQkRDRZIyIiIiIiIiISIpqsEREREREREREJEU3WiIiIiIiIiIiESFsma4wxnzTG/NwY8zNjzKAxpscY8zpjzGZjzC+NMbcaY/x2tE06SBBAbgTs+G0QtLtFUxPVdouIRJH6XIkixa10IsW1SJWWT9YYY14NrAYWW2uPBmLAcuBK4GvW2jcAu4BVrW6bdJAggOx2GFwOX+x3t9nt4e/0o9puEZEoUp8rUaS4lU6kuBaZpF3boOJArzEmDqSA54F3A3eMf389sKxNbZNOUMjCHatg208gKLrb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cFgAAAAAAABtFZhijSQ55+6XdH+n4wAAYLEZ/OPvNz3P/r/8rQWIBAAAAMfDl/EAAAAAAAACJFBn1gAAwo2foQYAAADmj2INAACordmLP3/h8MLEAQAA0GXMOdfpGObMzEYlvdTApCdLGlvgcIKM/jfW/zHn3LqFDoa8bRj9D1DeSg3lbtC3WdDjk4IfY6viC1LelgT9vS8JS5zS4ouVvA0e+h+gY4UuzFv6sbBmzduHH374F2Kx2DZJ5yrcl3fxJD2Zz+c3XXTRRW+WvxDqM2uccwONTGdme51zqxc6nqCi/8HqP3nbGPofvP4fL3eDGHO5oMcnBT/GoMdXy2Lb54YlTolY52Ox5e1Cof/B6n+35S396KxYLLbtlFNO+aWBgYGDkUgktGegeJ5no6Oj57zxxhvbJH24/LUwV6AAAAAAAED3OXdgYOBImAs1khSJRNzAwMBh+WcIVb7WgXgAAAAAAADmKhL2Qk1JsR8zajPdUqzZ2ukAOoz+h1NY424V+h8+QY856PFJwY8x6PHNR1j6FpY4JWJth7DG3Sr0P5zCGnc1+hFAf/RHf3TKO9/5znedeeaZ55x99tnn/OhHP+qf7zK/+c1vnvDZz372lFbEl0wmL2x02lBfYBgAAAAAAHSXxx57bP/5559fcWHkH/zgB/1/8Ad/8PaRkZHn+vr63M9//vNYJpOxwcHB3PGWl8vlFI/HFy7gomQyeWE6nd5X3f7YY4+dfP755w+Wt3XLmTUAAAAAAGCReu211+LLli3L9/X1OUl661vfmh8cHMytWLHi3T//+c9jkvSTn/wkeckll5wlSTfddNPbhoaGTv3VX/3VMz760Y+edt555529d+/e3tLyLrnkkrN2796d3LJly/Krr7561fj4eHTFihXvLhQKkqSJiYnIKaeccl4mk7GnnnqqZ+3atWe8613v+qWLLrrorH379vVK0rPPPpu44IILzj733HN/6cYbb3xbM/2hWAMAAAAAAELt8ssvP/L6668nBgcHz/3EJz6x6vvf//6S483z+OOPJ//xH//x+e9973svrl+//sA3v/nNZZL00ksvxd9888342rVr06Vply9fXjj77LPT999//1JJ2rFjxwnve9/7Dvf09LhNmzadetttt7381FNPPfPlL3/51U996lOrJOm6665btWnTptEnn3zymVNOOeW4Z/iUo1gDAAAAAABC7YQTTvCefPLJp2+99daXBgYG8tdcc807tmzZsny2edatW3doyZIlTpKuvvrqg/fee+9JknTXXXed9KEPfehg9fRXXnnlweHh4ZMk6dvf/vayDRs2HDx8+HBk3759S6688sp3nH322edcd911p7755ptxSXrkkUeWXHvttQck6ZOf/OR4M/2JNTMxAAAAAABAEMViMV166aUTl1566cR55503+Xd/93fLo9Go8zxPkjQ5OVlxwkp/f79XenzaaaflTjzxxPxDDz3Ud/fddy/767/+65eqlz80NHToi1/84op///d/jz755JPJD33oQ0eOHDkSWbp0af7ZZ599ulZMc/3VKs6sAQAAAAAAofbYY4/1PPHEEz2l5/v27etbuXJlduXKldl/+Zd/SUrSt7/97ZNmW8YVV1xx4C/+4i9OmZiYiF5yySWT1a+fcMIJ3vnnn5/65Cc/uer973//4VgspmXLlnkrV67MfuMb3zhJkjzP08jISJ8kvec97zl6xx13LJOkO+64Y9azfKpRrAEAAAAAAKF25MiR6NVXX33aO97xjnedeeaZ5zz77LN9X/rSl17//Oc///pnPvOZVRdddNFZ0Wh01rNcPvGJTxz8/ve/v+yyyy47UG+aj33sYwfvueeeZUNDQ8emGR4efuFv/uZvTj7rrLPOOeOMM961a9euEyXptttue3nr1q2/cO655/7S4cOHo830h5/uBgAAAAAAoVHrp7vDjJ/uBgAAAAAACDiKNQAAAAAAAAFCsQYAAAAAACBAKNYAAAAAAAAECMUaAAAAAACAAKFYAwAAAAAAECAUawAAAAAAAFpg586dbxkcHDx31apV5372s589Za7LoVgDAAAAAAAwT/l8Xr//+7+/6v777//Zz372s6d27dq17OGHH+6dy7JCXaxZt26dk8SNW6tubUHecmvxrW3IXW4tvLUNecuthbe2IW+5tfjWFuQttxbfFpznuWVHM/l3e85ddDSTf7fnuWXzXeaPf/zj/lNPPTVzzjnnZHt7e91HP/rRAzt37jxxLssKdbFmbGys0yEATSNvEVbkLsKIvEUYkbcII/IWYeJ5btl4KnPqtXfuTZz5uQd07Z17E+OpzKnzLdi88soriRUrVmRLz1euXJl97bXXEnNZVqiLNQAAAAAAAM1I5worbhh+NDLywrjyntPIC+O6YfjR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\n",
      "text/plain": [
       "<Figure size 1131.88x1080 with 42 Axes>"
      ]
     },
     "metadata": {},
     "output_type": "display_data"
    }
   ],
   "source": [
    "sns.pairplot(train.drop(\"Name\",axis = 1).dropna(),hue = \"Survived\")"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "Not much information could be extracted from the correlation table"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "Now lets see how we can handle the missing values of Age"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "1. By filling with mean value\n",
    "i.e, train.fillna(value = df.mean())"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "2. By filling mean value of corresponding Survived category"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 29,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/html": [
       "<div>\n",
       "<style scoped>\n",
       "    .dataframe tbody tr th:only-of-type {\n",
       "        vertical-align: middle;\n",
       "    }\n",
       "\n",
       "    .dataframe tbody tr th {\n",
       "        vertical-align: top;\n",
       "    }\n",
       "\n",
       "    .dataframe thead th {\n",
       "        text-align: right;\n",
       "    }\n",
       "</style>\n",
       "<table border=\"1\" class=\"dataframe\">\n",
       "  <thead>\n",
       "    <tr style=\"text-align: right;\">\n",
       "      <th></th>\n",
       "      <th>count</th>\n",
       "      <th>mean</th>\n",
       "      <th>std</th>\n",
       "      <th>min</th>\n",
       "      <th>25%</th>\n",
       "      <th>50%</th>\n",
       "      <th>75%</th>\n",
       "      <th>max</th>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>Survived</th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "      <th></th>\n",
       "    </tr>\n",
       "  </thead>\n",
       "  <tbody>\n",
       "    <tr>\n",
       "      <th>0</th>\n",
       "      <td>424.0</td>\n",
       "      <td>30.626179</td>\n",
       "      <td>14.172110</td>\n",
       "      <td>1.00</td>\n",
       "      <td>21.0</td>\n",
       "      <td>28.0</td>\n",
       "      <td>39.0</td>\n",
       "      <td>74.0</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>290.0</td>\n",
       "      <td>28.343690</td>\n",
       "      <td>14.950952</td>\n",
       "      <td>0.42</td>\n",
       "      <td>19.0</td>\n",
       "      <td>28.0</td>\n",
       "      <td>36.0</td>\n",
       "      <td>80.0</td>\n",
       "    </tr>\n",
       "  </tbody>\n",
       "</table>\n",
       "</div>"
      ],
      "text/plain": [
       "          count       mean        std   min   25%   50%   75%   max\n",
       "Survived                                                           \n",
       "0         424.0  30.626179  14.172110  1.00  21.0  28.0  39.0  74.0\n",
       "1         290.0  28.343690  14.950952  0.42  19.0  28.0  36.0  80.0"
      ]
     },
     "execution_count": 29,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "train.groupby('Survived').describe()['Age']"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "Both values actually look very similar"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "Now let's try something special.\n",
    "If we see the name column, there is data which corresponds to the age of the person. Yes: Mr. Mrs. Master. Miss. \n",
    "So lets use that in filling the NA values for age."
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 30,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/html": [
       "<div>\n",
       "<style scoped>\n",
       "    .dataframe tbody tr th:only-of-type {\n",
       "        vertical-align: middle;\n",
       "    }\n",
       "\n",
       "    .dataframe tbody tr th {\n",
       "        vertical-align: top;\n",
       "    }\n",
       "\n",
       "    .dataframe thead th {\n",
       "        text-align: right;\n",
       "    }\n",
       "</style>\n",
       "<table border=\"1\" class=\"dataframe\">\n",
       "  <thead>\n",
       "    <tr style=\"text-align: right;\">\n",
       "      <th></th>\n",
       "      <th>Survived</th>\n",
       "      <th>Pclass</th>\n",
       "      <th>Name</th>\n",
       "      <th>Sex</th>\n",
       "      <th>Age</th>\n",
       "      <th>SibSp</th>\n",
       "      <th>Parch</th>\n",
       "      <th>Fare</th>\n",
       "      <th>Cabin</th>\n",
       "      <th>Embarked</th>\n",
       "    </tr>\n",
       "  </thead>\n",
       "  <tbody>\n",
       "    <tr>\n",
       "      <th>0</th>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Braund, Mr. Owen Harris</td>\n",
       "      <td>male</td>\n",
       "      <td>22.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>7.2500</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>Cumings, Mrs. John Bradley (Florence Briggs Th...</td>\n",
       "      <td>female</td>\n",
       "      <td>38.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>71.2833</td>\n",
       "      <td>C85</td>\n",
       "      <td>C</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>2</th>\n",
       "      <td>1</td>\n",
       "      <td>3</td>\n",
       "      <td>Heikkinen, Miss. Laina</td>\n",
       "      <td>female</td>\n",
       "      <td>26.0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>7.9250</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>3</th>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>Futrelle, Mrs. Jacques Heath (Lily May Peel)</td>\n",
       "      <td>female</td>\n",
       "      <td>35.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>53.1000</td>\n",
       "      <td>C123</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>4</th>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Allen, Mr. William Henry</td>\n",
       "      <td>male</td>\n",
       "      <td>35.0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>8.0500</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "    </tr>\n",
       "  </tbody>\n",
       "</table>\n",
       "</div>"
      ],
      "text/plain": [
       "   Survived  Pclass                                               Name  \\\n",
       "0         0       3                            Braund, Mr. Owen Harris   \n",
       "1         1       1  Cumings, Mrs. John Bradley (Florence Briggs Th...   \n",
       "2         1       3                             Heikkinen, Miss. Laina   \n",
       "3         1       1       Futrelle, Mrs. Jacques Heath (Lily May Peel)   \n",
       "4         0       3                           Allen, Mr. William Henry   \n",
       "\n",
       "      Sex   Age  SibSp  Parch     Fare Cabin Embarked  \n",
       "0    male  22.0      1      0   7.2500   NaN        S  \n",
       "1  female  38.0      1      0  71.2833   C85        C  \n",
       "2  female  26.0      0      0   7.9250   NaN        S  \n",
       "3  female  35.0      1      0  53.1000  C123        S  \n",
       "4    male  35.0      0      0   8.0500   NaN        S  "
      ]
     },
     "execution_count": 30,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "train.head(5)"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 31,
   "metadata": {},
   "outputs": [],
   "source": [
    "def extract(x):\n",
    "    temp = x.split(\" \")\n",
    "    if \"Mr.\" in temp:\n",
    "        return \"Mr\"\n",
    "    elif \"Mrs.\" in temp:\n",
    "        return \"Mrs\"\n",
    "    elif \"Miss.\" in temp:\n",
    "        return \"Miss\"\n",
    "    elif \"Master.\" in temp:\n",
    "        return \"Master\"\n",
    "    elif \"Dr.\" in temp:\n",
    "        return \"Dr\"\n",
    "    else:\n",
    "        return None"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 32,
   "metadata": {},
   "outputs": [],
   "source": [
    "train[\"Category\"] = train[\"Name\"].apply(extract)"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 33,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/html": [
       "<div>\n",
       "<style scoped>\n",
       "    .dataframe tbody tr th:only-of-type {\n",
       "        vertical-align: middle;\n",
       "    }\n",
       "\n",
       "    .dataframe tbody tr th {\n",
       "        vertical-align: top;\n",
       "    }\n",
       "\n",
       "    .dataframe thead th {\n",
       "        text-align: right;\n",
       "    }\n",
       "</style>\n",
       "<table border=\"1\" class=\"dataframe\">\n",
       "  <thead>\n",
       "    <tr style=\"text-align: right;\">\n",
       "      <th></th>\n",
       "      <th>Survived</th>\n",
       "      <th>Pclass</th>\n",
       "      <th>Name</th>\n",
       "      <th>Sex</th>\n",
       "      <th>Age</th>\n",
       "      <th>SibSp</th>\n",
       "      <th>Parch</th>\n",
       "      <th>Fare</th>\n",
       "      <th>Cabin</th>\n",
       "      <th>Embarked</th>\n",
       "      <th>Category</th>\n",
       "    </tr>\n",
       "  </thead>\n",
       "  <tbody>\n",
       "    <tr>\n",
       "      <th>0</th>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Braund, Mr. Owen Harris</td>\n",
       "      <td>male</td>\n",
       "      <td>22.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>7.2500</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "      <td>Mr</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>1</th>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>Cumings, Mrs. John Bradley (Florence Briggs Th...</td>\n",
       "      <td>female</td>\n",
       "      <td>38.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>71.2833</td>\n",
       "      <td>C85</td>\n",
       "      <td>C</td>\n",
       "      <td>Mrs</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>2</th>\n",
       "      <td>1</td>\n",
       "      <td>3</td>\n",
       "      <td>Heikkinen, Miss. Laina</td>\n",
       "      <td>female</td>\n",
       "      <td>26.0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>7.9250</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "      <td>Miss</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>3</th>\n",
       "      <td>1</td>\n",
       "      <td>1</td>\n",
       "      <td>Futrelle, Mrs. Jacques Heath (Lily May Peel)</td>\n",
       "      <td>female</td>\n",
       "      <td>35.0</td>\n",
       "      <td>1</td>\n",
       "      <td>0</td>\n",
       "      <td>53.1000</td>\n",
       "      <td>C123</td>\n",
       "      <td>S</td>\n",
       "      <td>Mrs</td>\n",
       "    </tr>\n",
       "    <tr>\n",
       "      <th>4</th>\n",
       "      <td>0</td>\n",
       "      <td>3</td>\n",
       "      <td>Allen, Mr. William Henry</td>\n",
       "      <td>male</td>\n",
       "      <td>35.0</td>\n",
       "      <td>0</td>\n",
       "      <td>0</td>\n",
       "      <td>8.0500</td>\n",
       "      <td>NaN</td>\n",
       "      <td>S</td>\n",
       "      <td>Mr</td>\n",
       "    </tr>\n",
       "  </tbody>\n",
       "</table>\n",
       "</div>"
      ],
      "text/plain": [
       "   Survived  Pclass                                               Name  \\\n",
       "0         0       3                            Braund, Mr. Owen Harris   \n",
       "1         1       1  Cumings, Mrs. John Bradley (Florence Briggs Th...   \n",
       "2         1       3                             Heikkinen, Miss. Laina   \n",
       "3         1       1       Futrelle, Mrs. Jacques Heath (Lily May Peel)   \n",
       "4         0       3                           Allen, Mr. William Henry   \n",
       "\n",
       "      Sex   Age  SibSp  Parch     Fare Cabin Embarked Category  \n",
       "0    male  22.0      1      0   7.2500   NaN        S       Mr  \n",
       "1  female  38.0      1      0  71.2833   C85        C      Mrs  \n",
       "2  female  26.0      0      0   7.9250   NaN        S     Miss  \n",
       "3  female  35.0      1      0  53.1000  C123        S      Mrs  \n",
       "4    male  35.0      0      0   8.0500   NaN        S       Mr  "
      ]
     },
     "execution_count": 33,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "train.head()"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 34,
   "metadata": {},
   "outputs": [
    {
     "data": {
      "text/plain": [
       "array(['Mr', 'Mrs', 'Miss', 'Master', None, 'Dr'], dtype=object)"
      ]
     },
     "execution_count": 34,
     "metadata": {},
     "output_type": "execute_result"
    }
   ],
   "source": [
    "train[\"Category\"].unique()"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 35,
   "metadata": {},
   "outputs": [
    {
     "name": "stdout",
     "output_type": "stream",
     "text": [
      "Mr. 32.368090452261306\n",
      "Mrs. 35.898148148148145\n",
      "Miss. 21.773972602739725\n",
      "Master. 4.574166666666667\n",
      "Dr. 42.0\n"
     ]
    }
   ],
   "source": [
    "print(\"Mr.\" , np.mean(train[train[\"Category\"] == \"Mr\"][\"Age\"]))\n",
    "print(\"Mrs.\" , np.mean(train[train[\"Category\"] == \"Mrs\"][\"Age\"]))\n",
    "print(\"Miss.\" , np.mean(train[train[\"Category\"] == \"Miss\"][\"Age\"]))\n",
    "print(\"Master.\" , np.mean(train[train[\"Category\"] == \"Master\"][\"Age\"]))\n",
    "print(\"Dr.\" , np.mean(train[train[\"Category\"] == \"Dr\"][\"Age\"]))"
   ]
  },
  {
   "cell_type": "markdown",
   "metadata": {},
   "source": [
    "This should be a better approach to fill the missing values of Age column"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": null,
   "metadata": {},
   "outputs": [],
   "source": []
  }
 ],
 "metadata": {
  "kernelspec": {
   "display_name": "Python 3",
   "language": "python",
   "name": "python3"
  },
  "language_info": {
   "codemirror_mode": {
    "name": "ipython",
    "version": 3
   },
   "file_extension": ".py",
   "mimetype": "text/x-python",
   "name": "python",
   "nbconvert_exporter": "python",
   "pygments_lexer": "ipython3",
   "version": "3.6.5"
  }
 },
 "nbformat": 4,
 "nbformat_minor": 2
}